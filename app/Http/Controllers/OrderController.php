<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
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

        $cart = new Cart();
        $cart->user_id = auth()->user()->id;
        $cart->save();

        $cartItem = new CartItem();
        $cartItem->cart_id = $cart->id;
        $cartItem->product_id = $product->id;
        $cartItem->quantity = $quantity;

    }
}
