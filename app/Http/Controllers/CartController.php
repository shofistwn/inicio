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

    public function destroy($id)
    {
        Cart::find($id)->delete();
    }
}
