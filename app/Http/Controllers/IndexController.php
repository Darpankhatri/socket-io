<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function login(Request $request)
    {
        
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

            }
            else{
                return redirect()->back()->withInput()->with('error','Password Error!');
            }
        }
        else{
            return redirect()->back()->with('error','Account Not Found!');
        }
    }
}
