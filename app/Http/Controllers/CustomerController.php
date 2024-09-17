<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class CustomerController extends Controller
{
    public function viewallcustomerforseller()
    {
        $sellerid = Session('uid');
        $order = Order::with('user', 'product')->where('sellerid', $sellerid)->get();
        $customers = $order->groupBy('user.id')->map(function ($orderGroup) {
            $totalOrders = $orderGroup->count();
            $totalAmount = $orderGroup->sum('grandtotal');
            $user = $orderGroup->first()->user;

            return [

                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'totalOrders' => $totalOrders,
                'totalAmount' => $totalAmount,
            ];
        })->values()->all(); // Convert collection to a plain array
        Log::alert($customers);
        return view('seller.allcustomer', compact('customers'));
    }
    public function viewallcustomerforadmin()
    {
        $order = Order::with('user', 'product')->get();
        $customers = $order->groupBy('user.id')->map(function ($orderGroup) {
            $totalOrders = $orderGroup->count();
            $totalAmount = $orderGroup->sum('grandtotal');
            $user = $orderGroup->first()->user;

            return [

                'id' => $user->id,
                'status' => $user->status,
                'name' => $user->name,
                'email' => $user->email,
                'totalOrders' => $totalOrders,
                'totalAmount' => $totalAmount,
            ];
        })->values()->all(); // Convert collection to a plain array
        return view('admin.allcustomer', compact('customers'));

    }

    public function changecustomerstatus(Request $request){
        $userId = $request->order_id;
        $newStatus = $request->orderstatus;

        $order = User::find($userId);
        if ($order) {
            $order->status = $newStatus;
            $order->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
