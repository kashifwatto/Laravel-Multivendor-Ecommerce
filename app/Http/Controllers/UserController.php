<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    public function UserSignup(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',

        ],[
            'email.unique'=>'Email Should be unique',

        ]);

        if ($validator->fails()) {
            Session::flash('formerrors', $validator->errors()->all());
            return redirect()->back()->withInput();
        }
        // moving image to folder


        $user=new User;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phonenumber=$request->phonenumber;
        $user->country=$request->country;
        $user->address=$request->address;
        $user->password=$request->password;
        $user->save();
        return redirect('/')->with('message', 'SignUp Successfull');


    }
    public function usersignin(Request $request){

        $user = User::where('email', $request->email)->first();
        if ($user && $user->password === $request->password) {
            if($user->status=='Suspend'){
                return redirect('/')->with('loginfailedmessage', 'Your account has been suspend!');

            }
            session(['userid' => $user->id, 'username'=>$user->name]);
            return redirect()->back()->with('message', 'Login Successfull');
        } else {
            return redirect('/')->with('loginfailedmessage', 'Login Failed!');
        }


    }
    public function usersignout(){
        // session()->forget(['uid']);
        session()->flush(); // Forget all sessions
        return redirect('/');
    }
}
