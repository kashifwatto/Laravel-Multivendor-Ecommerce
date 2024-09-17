<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;


class SellerController extends Controller
{
    // seller signup
    public function sellersignup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:sellers,email',

        ], [
            'email.unique' => 'Email Should be unique',

        ]);

        if ($validator->fails()) {
            Session::flash('formerrors', $validator->errors()->all());
            return redirect()->back()->withInput();
        }
        // moving image to folder
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploadedimages/users'), $imageName);
            $imagePath = $imageName;
        }

        $seller = new Seller;

        $seller->name = $request->name;
        $seller->email = $request->email;
        $seller->phonenumber = $request->phonenumber;
        $seller->country = $request->country;
        $seller->address = $request->address;
        $seller->password = $request->password;
        $seller->image = $imagePath;
        $seller->save();
        return redirect('/')->with('message', 'SignUp Successfull');
    }
    // seller signin
    public function sellersignin(Request $request)
    {

        $user = Seller::where('email', $request->email)->first();
        if ($user && $user->password === $request->password) {
                if($user->status=='Suspend'){
                    return redirect('/')->with('loginfailedmessage', 'Your account has been suspend!');

                }


            session(['uid' => $user->id, 'sellerusername' => $user->name]);
            return redirect('/seller/index')->with('message', 'Login Successfull');
        } else {
            return redirect('/')->with('loginfailedmessage', 'Login Failed!');
        }
    }
    // seller logout
    public function logout()
    {
        // session()->forget(['uid']);
        session()->flush(); // Forget all sessions
        return redirect('/');
    }
    // seller dashboard index

    public function index()
    {
        $sellerid = Session('uid');
        $catagory = Catagory::get();
        $products = Product::where('seller_id', $sellerid)->get();
        $today = Carbon::today();

        $todaysales = Order::where('sellerid', $sellerid)
            ->whereDate('created_at', $today)
            ->sum('grandtotal');
        $totalOrders = Order::where('sellerid', $sellerid)->count();
        $totalRevenue = Order::where('sellerid', $sellerid)->sum('grandtotal');
        // getting all active order
        $order = Order::with('user', 'product')->where('sellerid', $sellerid)->where('orderstatus', 'Onhold')->get();
        return view('seller.index', compact('products', 'catagory', 'todaysales', 'totalOrders', 'totalRevenue','order'));
    }
    public function viewallproduct()
    {
        $sellerid = Session('uid');
        $products = Product::where('seller_id', $sellerid)->get();
        $catagory = Catagory::get();
        return view('seller.allproduct', compact('products', 'catagory'));
    }

    public function viewallsellerforadmin()
    {
        $seller = Seller::get();

        return view('admin.allseller', compact('seller'));

    }

    public function changesellerstatus(Request $request){
        $userId = $request->order_id;
        $newStatus = $request->orderstatus;

        $order = Seller::find($userId);
        if ($order) {
            $order->status = $newStatus;
            $order->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
