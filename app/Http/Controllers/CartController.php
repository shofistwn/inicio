<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $products = Cart::where('user_id', auth()->user()->id)->with('product')->get();
        return view('pages.shop.cart', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'ids' => 'required',
            'quantities' => 'required',
        ]);

        foreach ($request['ids'] as $key => $id) {
            Cart::where('user_id', auth()->user()->id)
            ->where('product_id', $id)
            ->update([
                'quantity' => $request['quantities'][$key]
            ]);
        }

        return redirect()->route('shop.checkout2');
    }

    public function destroy($id)
    {
        Cart::find($id)->delete();
        return redirect()->route('shop.cart');
    }
}
