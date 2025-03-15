<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            'total_price' => $this->getTotalPrice()
        ]);
    }


    public function getShipRate(){

    }

}
