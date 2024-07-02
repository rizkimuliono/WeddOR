<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $categories;
    public function __construct()
    {
        $this->categories = Category::all();
        view()->share('categories', $this->categories);
    }

    public function index()
    {
        $data = [
            'title' => 'Cart',
            'menu'  => 'cart'
        ];

        $cart = Cart::with('items.product.images')->where('user_id', Auth::id())->firstOrCreate(['user_id' => Auth::id()]);
        return view('Auth.cart_index', compact('data','cart'));
    }

    public function addProduct(Request $request, Product $product)
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        $cartItem = $cart->items()->firstOrCreate(['product_id' => $product->id], ['quantity' => 0]);
        $cartItem->increment('quantity', $request->quantity ?? 1);
        return redirect()->back();
    }

    public function update(Request $request, CartItem $cartItem)
    {
        // dd($request->quantity);
        $cartItem->update(['quantity' => $request->quantity]);
        return redirect()->route('cart.index');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index');
    }
}
