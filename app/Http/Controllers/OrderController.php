<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function makeorder(Request $request)
    {
        $suserid = Session('userid');

        $cart = json_decode($request['cart'], true);
        foreach ($cart as $item) {
            $order = new Order;
            $price=$item['product']['price']*$item['quantity'];
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->city = $request->city;
            $order->details = $request->details;
            $order->grandtotal = $price;
            $order->userid = $suserid;
            $order->productid = $item['product']['id'];
            $order->sellerid = $item['product']['seller_id'];
            $order->quantity = $item['quantity'];
            $order->save();
            //    for delete item from cart after ordering
            $cartid = $item['id'];
            $cart = Cart::find($cartid);
            $cart->delete();
        }

        return redirect()->back()->with('message', 'Order has been placed ');

    }
    public function vieworderpage(){
        $userid=Session('userid');
        $order = Order::with('user','product')->where('userid', $userid)->where('orderstatus', 'Onhold')->get();
        $completedorder = Order::with('user','product')->where('userid', $userid)->where('orderstatus', 'Delivered')->get();

        return view('userfront.orders', compact('order','completedorder'));
    }


    // order view for seller

    public function viewallorderseller(){
        $sellerid=Session('uid');
        $order = Order::with('user','product')->where('sellerid', $sellerid)->where('orderstatus', 'Onhold')->get();

        return view('seller.allorders', compact('order'));


    }
    public function viewallcompletedorder(){
        $sellerid=Session('uid');
        $order = Order::with('user','product')->where('sellerid', $sellerid)->where('orderstatus', 'delivered')->get();

        return view('seller.allcompletedorder', compact('order'));


    }
    public function viewallcanceldorder(){
        $sellerid=Session('uid');
        $order = Order::with('user','product')->where('sellerid', $sellerid)  ->where('orderstatus', 'cancel')->get();

        return view('seller.allcancelededorder', compact('order'));


    }
    // order view for admin

    public function viewallordersellerforadmin(){

        $order = Order::with('user','product')->where('orderstatus', 'Onhold')->get();

        return view('admin.allorders', compact('order'));


    }
    public function viewallcompletedorderforadmin(){

        $order = Order::with('user','product')->where('orderstatus', 'delivered')->get();

        return view('admin.allcompletedorder', compact('order'));


    }
    public function viewallcanceldorderforadmin(){

        $order = Order::with('user','product')->where('orderstatus', 'cancel')->get();

        return view('admin.allcancelededorder', compact('order'));


    }
    public function changeorderstatus(Request $request){
        $orderId = $request->order_id;
        $newStatus = $request->orderstatus;

        $order = Order::find($orderId);
        if ($order) {
            $order->orderstatus = $newStatus;
            $order->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
