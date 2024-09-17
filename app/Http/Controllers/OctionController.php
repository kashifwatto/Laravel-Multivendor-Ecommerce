<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Catagory;
use App\Models\Oction;
use App\Models\Order;


class OctionController extends Controller
{
    public function octionpageload()
    {
        $sellerid = Session('uid');
        $products = Product::where('seller_id', $sellerid)->get();
        $catagory = Catagory::get();

        return view('seller.oction', compact('products', 'catagory'));
    }
    public function saveoction(Request $request)
    {
        $sellerid = Session('uid');
        $oction = new Oction;
        $oction->seller_id = $sellerid;
        $oction->product_id = $request->product;
        $oction->days = $request->days;
        $oction->save();
        return redirect()->back()->with('message', 'Oction has been started');
    }
    public function openBid(Request $request)
    {
        $suserid = Session('userid');
        $oction = Oction::find($request->octionid);
        if (($oction->amount) < ($request->amount)) {
            $oction->userid = $suserid;
            $oction->amount = $request->amount;
            $oction->save();
            return redirect()->back()->with('message', 'Bid has been opened');
        } else {
            return redirect()->back()->with('loginfailedmessage', 'Your bid amount has been grater then highest amount of this oction');
        }
    }
    public function activBids()
    {
        $sellerid = Session('uid');
        $oction = Oction::where('seller_id', $sellerid)->with('product')->get();
        $catagory = Catagory::get();
        return view('seller.activebids', compact('oction', 'catagory'));
    }
    public function closeAuction($id)
    {
        $auction = Oction::find($id)->with('product')->get();
        $sellerid = Session('uid');
        $order = new Order;
        foreach ($auction as $item) {
            $order->grandtotal = $item['amount'];
            $order->userid = $item->userid;
            $order->productid = $item->product_id;
            $order->sellerid = $sellerid;
            $order->quantity = '1';
            $order->save();
        }
        $auctiondelte = Oction::find($id);
        $auctiondelte->delete();
                return redirect()->back()->with('message', 'Auction has been end');
    }
}
