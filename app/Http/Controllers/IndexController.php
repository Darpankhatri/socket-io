<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\login_sessions;
use Stevebauman\Location\Facades\Location;

class IndexController extends Controller
{
    //
    public function login(Request $request)
    {
        $ip = $request->ip();
        // $ip = "103.217.178.0";
        // $location = Location::get($ip);
        
        $validate = Validator::make($request->all(), [

            'email' => 'required|email',
            'password' => 'required|min:5',
            
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        
        $user = User::where('email',$request->email)->first();
        if ($user) {
            if (Hash::check($request->password,$user->password)) {
                Auth::loginUsingId($user->id);
                 
                $userSession = new login_sessions;
                $userSession->user_id = $user->id;
                $userSession->session_id = session()->getId();
                $userSession->device_token = $request->device;
                $userSession->last_seen = now();
                $userSession->ip = $ip;
                $userSession->save();

                return redirect()->route('my.chat');
            }
            else{
                return redirect()->back()->with('error','Password Error!');
            }
        }
        else{
            return redirect()->back()->with('error','Account Not Found!');
        }
    }
}
