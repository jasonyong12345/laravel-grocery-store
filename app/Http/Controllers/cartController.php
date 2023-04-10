<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with('product')->get();

        return view('carts.index', ['carts' => $carts]);
    }

    public function create()
    {
        $products = Product::all();
        return view('carts.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($validatedData['product_id']);
        $cart = new Cart();
        $cart->product_id = $product->id;
        $cart->quantity = $validatedData['quantity'];
        $cart->save();

        return redirect()->route('carts.index');
    }

    public function edit(Cart $cart)
    {
        $products = Product::all();
        return view('carts.edit', compact('cart', 'products'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'product_id' => 'required', 
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->product_id = $request->input('product_id');
        $cart->quantity = $request->input('quantity');
        $cart->save();

        return redirect()->route('carts.index', $cart->id)->with('success', 'Cart updated successfully');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();

        return redirect()->route('carts.index')->with('success', 'Cart deleted successfully');
    }
}
