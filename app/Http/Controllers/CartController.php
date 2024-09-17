<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request)
    {

        $suserid = Session('userid');
        $cart = new Cart;
        $cart->productid = $request->productid;
        $cart->sellerid = $request->sellerid;
        $cart->userid = $suserid;
        $cart->quantity = $request->quantity;
        $cart->save();

        return redirect()->back()->with('message', 'Product has been added in your cart');
    }
    public function viewcart()
    {
        $suserid = Session('userid');
        // $cart=Cart::where('userid', $suserid)->get();
        $cart = Cart::with('product')->where('userid', $suserid)->get();
        return view('userfront.cart', compact('cart'));
    }
}
