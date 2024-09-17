<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Seller;


class MessageController extends Controller
{
    public function sendMessageToBuyerPageLoad($id)
    {
        $user = User::where('id', $id)->first();
        $sellerid = Session('uid');

        $messages = Message::where('seller_id', $sellerid)
        ->where('user_id', $id)
        ->orderBy('created_at', 'asc')
        ->get();
        return view('seller.message', compact('messages','user'));
    }
    public function viewsendMessageToSeller($id)
    {
        $seller = Seller::where('id', $id)->first();
        $userid = Session('userid');

        $messages = Message::where('seller_id', $id)
        ->where('user_id', $userid)
        ->orderBy('created_at', 'asc')
        ->get();
        return view('userfront.message', compact('seller','messages'));
    }
    public function  sendMessagetoBuyer(Request $request)
    {
        $sellerid = Session('uid');
        $message = new Message;
        $message->seller_id = $sellerid;
        $message->user_id = $request->user_id;
        $message->message = $request->message;
        $message->sentby = $request->sentby;

        $message->save();
        return redirect()->back();
    }
    public function  sendMessagetoSeller(Request $request)
    {
        $userid = Session('userid');
        $message = new Message;
        $message->seller_id =$request->seller_id;
        $message->user_id = $userid;
        $message->message = $request->message;
        $message->sentby = $request->sentby;

        $message->save();
        return redirect()->back();
    }
}
