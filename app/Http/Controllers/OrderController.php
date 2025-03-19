<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
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

        if ($cart->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        return view('user.pages.order.checkout', [
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

    public function getShippingRate(Request $request, $manualData = null)
    {
        $data = $manualData ?? $request->all(); // Gunakan manualData jika ada

        $validator = Validator::make($data, [
            'province' => 'required|string',
            'city' => 'required|string',
            'district' => 'required|string',
            'village' => 'required|string',
            'address_detail' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengecek ongkos kirim.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $customerInfo = User::findOrFail(Auth::user()->id);
            $customerAddress = "$data[district], $data[city], $data[province]";

            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'authorization' => Config::get('app.api_key_biteship'),
            ]);

            // Origin Address
            $getOrigin = $response->get('https://api.biteship.com/v1/maps/areas', [
                'countries' => 'ID',
                'input' => 'Babakan, Bogor Tengah, Kota Bogor. 16128',
                'type' => 'single'
            ]);

            $origin = json_decode($getOrigin->body());
            $originId = $origin->areas[0]->id;

            // Destination Address
            $getDestination = $response->get('https://api.biteship.com/v1/maps/areas', [
                'countries' => 'ID',
                'input' => $customerAddress,
                'type' => 'single'
            ]);

            $destination = json_decode($getDestination->body());
            $destinationId = $destination->areas[0]->id;

            // Ambil data cart
            $cartSummary = $this->getCartSummary();
            $cartData = [
                'name' => $customerInfo->name,
                'value' => $cartSummary['total_price'],
                'quantity' => $cartSummary['total_items'],
                'weight' => $cartSummary['total_weight'],
            ];

            // Hitung biaya pengiriman
            $courierOptions = $response->post('https://api.biteship.com/v1/rates/couriers', [
                'origin_area_id' => $destinationId,
                'destination_area_id' => $originId,
                'origin_postal_code' => 16128,
                'destination_postal_code' => $customerInfo->zip_code,
                'couriers' => 'jne',
                'items' => [$cartData]
            ]);

            $courierOptions = json_decode($courierOptions->body());
            $courier = $courierOptions->pricing[0]->price;
            $courierCode = $courierOptions->pricing[0]->courier_code;

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengecek ongkos kirim.',
                'price' => $courier,
                'courier' => $courierCode
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengecek ongkos kirim.',
                'data' => $th->getMessage()
            ], 500);
        }
    }

    public function checkout(Request $request)
    {
        $manualData = [
            'province' => 'Jawa Barat',
            'city' => 'Bandung',
            'district' => 'Cicendo',
            'village' => 'Pasirkaliki',
            'address_detail' => 'Jl. Merdeka No. 1'
        ];

        $shippingRateResponse = $this->getShippingRate($request, $manualData);
        $shippingData = $shippingRateResponse->getData();

        if(!$shippingData->status) {
            return back()->with('error', 'Failed to get shipping rate. Please try again.');
        }

        DB::beginTransaction();
        try {
            $user = auth()->user();
            $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

            if ($cartItems->isEmpty()) {
                return back()->with('error', 'Your cart is empty.');
            }

            $orderId = $this->generateOrderId();

            // Create new order
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => $orderId,
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'village' => $request->village,
                'district' => $request->district,
                'city' => $request->city,
                'province' => $request->province,
                'detail_address' => $request->detail_address,
                'status' => 'pending',
                'shipping_cost' => $shippingData->price,
                'courier' => $shippingData->courier,
                'transaction_status' => 'pending',
                'transaction_time' => now(),
            ]);

            $totalAmount = 0;

            // Move cart items to order_items
            foreach ($cartItems as $cartItem) {
                $subtotal = $cartItem->quantity * $cartItem->product->price;
                $totalAmount += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product->id,
                    'path' => $cartItem->product->images[0]->path,
                    'name' => $cartItem->product->name,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->product->price,
                ]);
            }

            $grossAmount = $totalAmount + $order->shipping_cost;

            // Update total amount in order
            $order->update([
                'gross_amount' => $grossAmount
            ]);

            // Clear user's cart
            Cart::where('user_id', $user->id)->delete();

             // Midtrans Integration
            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = Config::get('app.midtrans_server_key');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = true;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $orderId,
                    'gross_amount' => $grossAmount,
                ),
                'customer_details' => array(
                    'first_name' =>  $request->name,
                    'last_name' => '',
                    'email' => Auth::user()->email,
                    'phone' =>  $request->phone_number,
                ),
            );

            // $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Request payment midtrans
            $auth = base64_encode(Config::get('app.midtrans_server_key').":");
            $midtransUrl = 'https://app.sandbox.midtrans.com/snap/v1/transactions';

            if(Config::get('app.is_production')) {
                $midtransUrl = 'https://app.midtrans.com/snap/v1/transactions';
            }

            $response = Http::withHeaders([
                'content-type' => 'application/json',
                'authorization' => 'Basic '.$auth,
            ])->post($midtransUrl, $params);

            $response = json_decode($response->body());

            // dd($response);

            $snapToken = $response->token;


            // Update snaptoken
            $order->update([
                'midtrans_response' => $snapToken
            ]);


            DB::commit();

            // dd($response);


            return redirect()->route('payment-page',  $orderId)
                ->with('success', 'Order item saved.');

        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', 'Failed to process checkout. Please try again.'. $th->getMessage());
        }
    }

    public function paymentPage($orderId) {

        // Check if order number is missing, then redirect with an error message
        if (!$orderId) {
            return redirect()->route('history')->with('error', 'Transaction not found.');
        }

        $transaction = Order::where('order_number', $orderId)
                ->first();

        if(!$transaction) {
            return redirect()->route('history')->with('error', 'Transaction not found.');
        }

        $isPaid = false;
        $transactionStatus = $transaction->transaction_status;

        if(in_array($transactionStatus, ['capture','settlement'])){
            $isPaid = true;
        }

        return view('user.pages.order.payment', [
            'type_menu'=> 'shop',
            'totalPayment' => $transaction->gross_amount,
            'snapToken' => $transaction->midtrans_response,
            'isPaid' => $isPaid,
            'transactionStatus'=> $transactionStatus
        ]);


        // return view('pages.user.payment', compact('totalPayment', 'snapToken','isPaid'));


    }

    public function paymentStatus(String $statusParameter){

        $orderId = request('order_id');
        $transactionStatus = request('transaction_status');

        // Valid payment status
        $urlStatus = ['success', 'fail', 'unfinish'];

        // Validate statusParameter
        if (!in_array($statusParameter, $urlStatus)) {
            return redirect()->route('history')->with('error', 'Transaction not found.');
        }

        $transaction = Order::where('order_number', $orderId)->first();

        if (!$transaction) {
            return redirect()->route('history')->with('error', 'Transaction not found.');
        }

        if($statusParameter == 'success' && ($transactionStatus == 'settlement' || $transactionStatus == 'capture')) {

            return view('user.pages.order.success', [
                'type_menu'=> 'shop',
            ]);
        } elseif($statusParameter == 'unfinish' || ($statusParameter == 'success' && ($transactionStatus == 'pending' ))){
            return view('user.pages.order.unfinish', [
                'type_menu'=> 'shop',
            ]);
        }

        else {
            return view('user.pages.order.fail', [
                'type_menu'=> 'shop',
            ]);
        }

    }

    public function webhookPayment(Request $request) {

        // Request payment midtrans
        $transactionStatuses = ['capture', 'settlement', 'cancel', 'expire'];

        $transactionId = $request->order_id;
        $transactionStatus = $request->transaction_status;

        try {
            $orderInfo = Order::where('order_number', $transactionId)->firstOrFail();

            if(in_array($transactionStatus, $transactionStatuses)){
                $orderInfo->transaction_status = $transactionStatus;
                $orderInfo->save();
            }

            if($transactionStatus === 'settlement' || $transactionStatus === 'capture') {
                $orderInfo->status = 'paid';
                $orderInfo->payment_method = $request->acquirer;
                $orderInfo->save();

                return response()->json([
                    'message' => 'Payment successful',
                    'status' => $transactionStatus
                ],200);

            } else {
                return response()->json([
                    'message' => 'Payment was not successful',
                    'status' => $transactionStatus
                ],400);

            }

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Payment was not successful -> '.$th->getMessage(),
                'status' => $transactionStatus
            ],400);
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

    public function trackOrder(Order $order) {
        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => Config::get('app.api_key_biteship'),
        ]);

        $getTracking = $response->get('https://api.biteship.com/v1/trackings/'. $order->tracking_number . '/couriers/' . $order->courier);

        $tracking = json_decode($getTracking->body());

        return response()->json([
            'success' => $tracking->success,
            'data' => $tracking
        ]);
    }

    public function finishOrder(Order $order){
        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => Config::get('app.api_key_biteship'),
        ]);

        $getTracking = $response->get('https://api.biteship.com/v1/trackings/'. $order->tracking_number . '/couriers/' . $order->courier);

        $tracking = json_decode($getTracking->body());

        if ($tracking->status == 'delivered') {
            $order->status = 'arrived';
            $order->save();

            return response()->json([
                'success' => true,
                'message' => 'Order has been arrived'
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Order has not been arrived'
        ], 400);
    }

}
