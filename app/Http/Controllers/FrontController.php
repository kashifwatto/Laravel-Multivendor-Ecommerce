<?php

namespace App\Http\Controllers;
use App\Models\Seller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Oction;
use App\Models\Bid;

class FrontController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at', 'desc')->take(16)->get();
        $hotproducts = Product::orderBy('created_at', 'desc')->take(4)->get();
        return view('userfront.index', compact('products','hotproducts'));


    }
    public function viewshop(){
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('userfront.shop', compact('products'));


    }
    public function viewabout(){
        return view('userfront.about');


    }
    public function Productdetails($id){
        $product=Product::find($id);
        $seller_id=$product->seller_id;
        $catagory_id=$product->catagory_id;
        $seller=Seller::find($seller_id);
        $catagory=Catagory::find($catagory_id);
       return view('userfront.product-detail', compact('product','seller','catagory'));

    }
    public function oction(){
        $oction = Oction::with('product')->get();

        return view('userfront.oction', compact('oction'));


    }
}
