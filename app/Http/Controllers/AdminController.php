<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function adminloginpageload(){
        return view('admin.loginpage');
    }
    public function adminsignin(Request $request){

        $admin = Admin::where('email', $request->email)->first();
        if ($admin && $admin->password === $request->password) {
            session(['adminid' => $admin->id,'adminusername' => $admin->name]);
            return redirect('/admin/index')->with('message', 'Login Successfull');
        } else {
            return redirect('/')->with('loginfailedmessage', 'Login Failed!');
        }


    }
    public function index(){
        $catagory = Catagory::get();
        $products = Product::get();
        $today = Carbon::today();

        $todaysales = Order::whereDate('created_at', $today)
            ->sum('grandtotal');
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('grandtotal');
        // getting all active order
        $order = Order::with('user', 'product')->where('orderstatus', 'Onhold')->get();

        return view('admin.index', compact('products', 'catagory', 'todaysales', 'totalOrders', 'totalRevenue','order'));

    }
}
