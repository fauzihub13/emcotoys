<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Facade as Indonesia;
use Str;


class OrderController extends Controller
{

    public function cart()
    {
        $cart = Cart::where('user_id', auth()->user()->id)
                ->with(['product'])
                ->descending()->get();

        // Calculate total price
        $totalPrice = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return view('user.pages.profile.cart', [
            'type_menu'=> 'cart',
            'carts' => $cart,
            'total_price'=> $totalPrice
        ]);
    }

    public function addToCart(Request $request, Product $product){

        $validator = Validator::make($request->all(), [
            'quantity'=> 'required|integer'
        ]);

        $quantity = $request->quantity;

        // Failed validation of quantity
        if ($validator->fails() || $quantity <= 0) {
            return back()->with('error', 'Invalid product quantiry');
        }
        if ($quantity >= $product->stock) {
            return back()->with('error', 'Product out of stock.');
        }

        // Check if the product is already in the cart
        $cartItem = Cart::where('user_id', auth()->id())
                    ->where('product_id', $product->id)
                    ->first();

        if ($cartItem) {
            // Update existing cart item
            $newQuantity = $cartItem->quantity + $quantity;

            // Ensure stock is not exceeded
            if ($newQuantity > $product->stock) {
                return back()->with('error', 'Not enough stock available.');
            }

            $cartItem->update(['quantity' => $newQuantity]);
        } else {
            // Create new cart item
            Cart::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        return back()->with('success', 'Product added to cart successfully.');

    }

    public function deleteCart($id)
    {
        try {
            $cart = Cart::findOrFail($id);
            if($cart){
                $cart->delete();
                return back()->with('success', 'Cart deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete cart. Please try again. '. $th->getMessage());

        }
    }

    public function incrementCart($id)
    {
        try {
            $cart = Cart::findOrFail($id);
            if ($cart) {

                $cart->increment('quantity');
                $totalPrice = $this->getTotalPrice();
                return response()->json([
                    'success' => true,
                    'quantity' => $cart->quantity,
                    'total_price' => $totalPrice,
                    'message' => 'Cart quantity increased successfully.'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to increment cart. Please try again. ' . $th->getMessage()
            ], 500);
        }
    }

    public function decrementCart($id)
    {
        try {
            $cart = Cart::findOrFail($id);
            if ($cart) {
                if ($cart->quantity > 1) {
                    $cart->decrement('quantity');
                    $totalPrice = $this->getTotalPrice();
                    return response()->json([
                        'success' => true,
                        'quantity' => $cart->quantity,
                        'total_price' => $totalPrice,
                        'message' => 'Cart quantity decreased successfully.'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Cart quantity cannot be less than 1.'
                    ], 400);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to decrement cart. Please try again. ' . $th->getMessage()
            ], 500);
        }
    }

    public function getTotalPrice(){
        $cart = Cart::where('user_id', auth()->user()->id)
                ->with(['product'])
                ->descending()->get();

        // Calculate total price
        $totalPrice = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        return $totalPrice;
    }

    public function checkoutPage()
    {
        $cart = Cart::where('user_id', auth()->user()->id)
                ->with(['product', 'product.images'])
                ->descending()->get();

        return view('user.pages.product.checkout', [
            'type_menu'=> 'shop',
            'carts'=> $cart,
            'total_price' => $this->getTotalPrice(),
            'provinces' => Indonesia::allProvinces()
        ]);
    }

    public function getCartSummary() {
        $cart = Cart::where('user_id', auth()->user()->id)
            ->with(['product']) // Load related product data
            ->descending()
            ->get();

        $summary = [
            'total_items' => $cart->sum('quantity'),
            'total_price' => $cart->sum(fn($item) => $item->quantity * $item->product->price),
            'total_weight' => $cart->sum(fn($item) => $item->quantity * $item->product->weight),
        ];

        return $summary;
    }

    public function getShippingRate(Request $request){

            // return response()->json([
            //     'status' => true,
            //     'message' => 'tes mengecek ongkos kirim.',
            //     'data' => $request->all()
            // ], 200);

        $validator = Validator::make($request->all(), [
            'name'=> 'required|string',
            'phone_number'=> 'required|integer|digits_between:11,14',
            'province'=> 'required|string',
            'city'=> 'required|string',
            'district'=> 'required|string',
            'village'=> 'required|string',
            'address_detail'=> 'nullable|string',
        ]);

        if ($validator->fails()) {
            // return back()->withErrors($validator)->withInput();
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengecek ongkos kirim.',
                'errors' => $validator->errors()
            ], 422);
        }

        $apiKeyBiteship = Config::get('app.api_key_biteship');



        try {
            $customerInfo = User::findOrFail(Auth::user()->id);
            $customerAddress = "$request->district, $request->city, $request->province";

            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'authorization' => $apiKeyBiteship,
            ]);

            // Origin Adress
            $getOrigin = $response->get('https://api.biteship.com/v1/maps/areas', [
                'countries' => 'ID',
                'input' => 'Babakan, Bogor Tengah, Kota Bogor. 16128',
                'type' => 'single'
            ]);

            $origin = json_decode($getOrigin->body());

            $originId =  $origin->areas[0]->id;

            // Destination Address
            $getDestination = $response->get('https://api.biteship.com/v1/maps/areas', [
                'countries' => 'ID',
                'input' => $customerAddress,
                'type' => 'single'
            ]);

            $destination = json_decode($getDestination->body());

            $destinationId =  $destination->areas[0]->id;
            $cartSummary = $this->getCartSummary();
            $cartData = [
                'name' => $customerInfo->name,
                'value' => $cartSummary['total_price'],
                'quantity' => $cartSummary['total_items'],
                'weight' => $cartSummary['total_weight'],
            ];

            $courierOptions = $response->post('https://api.biteship.com/v1/rates/couriers', [
                'origin_area_id' => $destinationId,
                'destination_area_id' => $originId,
                'origin_postal_code' => 16128,
                'destination_postal_code' => $customerInfo->zip_code,
                'couriers' => 'jne',
                'items' => [$cartData]
            ]);

            $courierOptions = json_decode($courierOptions);
            $courier = $courierOptions->pricing[0]->price;
            $courierCode = $courierOptions->pricing[0]->courier_code;

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengecek ongkos kirim.',
                'price' => ($courier),
                'courier' => ($courierCode)
            ], 200);


        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => 'Gagal mengecek ongkos kirim.',
                'data' => $th->getMessage()
            ], 201);
        }
    }

    function generateOrderId() {

        // Generate 3 random uppercase letters
        $letters = '';
        while (strlen($letters) < 3) {
            $char = strtoupper(Str::random(1));
            if (ctype_alpha($char)) {  // Check if the character is a letter
                $letters .= $char;
            }
        }

        // Generate 8 random numbers
        $numbers = rand(10000000, 99999999);

        $result = $letters ."-". $numbers;

        // Combine the letters and numbers
        return $result;
    }

}
