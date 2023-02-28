<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Product $product, Request $request)
    {
        // Проверяем, что пользователь авторизован
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $product = Product::findOrFail($productId);

        // Проверяем, что на складе достаточно товара
        if ($product->quantity < $quantity) {
            return redirect()->back()->with('Ошибка', 'На складе недостаточно товара.');
        }

        $cart = Cart::firstOrNew(['user_id' => auth()->id(), 'product_id' => $productId]);
        $cart->quantity += $quantity;
        $cart->save();

        return redirect()->back();
    }


    public function addOnCart(Request $request, $productId)
    {
        // Проверяем, что пользователь авторизован
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $product = Product::find($productId);
        $cart = Cart::where(['user_id' => auth()->id(), 'product_id' => $productId])->first();

        if ($cart) {
            $newQuantity = $cart->quantity + $request->input('quantity', 1);
            if ($newQuantity > $product->quantity) {
                return back()->withErrors(['quantity' => 'Недостаточно товара на складе']);
            }
            $cart->quantity = $newQuantity;
        } else {
            if ($request->input('quantity', 1) > $product->quantity) {
                return back()->withErrors(['quantity' => 'Недостаточно товара на складе']);
            }
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->product_id = $productId;
            $cart->quantity = $request->input('quantity', 1);
        }

        $cart->save();

        return redirect()->back();
    }


    public function removeFromCart(Request $request, $productId)
    {
        // Проверяем, что пользователь авторизован
        if (!Auth::check()) {
            return response()->json(['error' => 'Необходимо авторизоваться']);
        }

        $cart = Cart::where('product_id', $productId)->first();
        $cart->quantity--;
        if ($cart->quantity < 1) {
            $cart->delete();
        } else {
            $cart->save();
        }

        return redirect()->back();
    }

    public function removeAllFromCart(Request $request, $productId)
    {
        // Проверяем, что пользователь авторизован
        if (!Auth::check()) {
            return response()->json(['error' => 'Необходимо авторизоваться']);
        }

        $cart = Cart::where('product_id', $productId)->first();
        $cart->delete();

        return redirect()->back();
    }

    public function showCart()
    {
        // Проверяем, что пользователь авторизован
        if (!Auth::check()) {
            return redirect('/login');
        }

        $carts = Cart::with('product')->get();

        return view('cart', compact('carts'));
    }
}
