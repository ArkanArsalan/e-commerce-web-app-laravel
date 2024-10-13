<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        
        // Check if the product is already in the cart
        $cart = Cart::where('user_id', Auth::id())->where('product_id', $product->id)->first();

        if ($cart) {
            // If the product is already in the cart, increase the quantity
            $cart->quantity += 1;
            $cart->save();
        } else {
            // Otherwise, create a new cart entry
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity ?? 1,
            ]);
        }

        return redirect('/products')->with('success', 'Product added to cart.');
    }

    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart', compact('cartItems'));
    }

    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'quantity' => $request->quantity,
        ]);

        return redirect('/cart')->with('success', 'Cart updated.');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart')->with('success', 'Item removed from cart.');
    }

}
