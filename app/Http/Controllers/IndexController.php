<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\sessions;
use App\Models\login_sessions;
use Stevebauman\Location\Facades\Location;
use WhichBrowser\Parser;
use App\Events\AfterControllerReturned;

class IndexController extends Controller
{
    //
    public function check_yes()
    {
        $ip = "103.217.178.0";
        $location = Location::get($ip);
        dd($location);
        // $user = sessions::all();
        
        // foreach($user as $key => $data){
        //     // $userAgent = $data->user_agent;
        //     $userAgentString = "Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36";

        //     $browserInfo = new Parser($userAgentString);
        //     $browser = $browserInfo->browser->type . ' ' . $browserInfo->browser->name;
        //     $device = $browserInfo->os->name . ' ' . $browserInfo->device->type;
        //     dd(ucwords($browser),ucwords($device));

        // }
    }
    public function login(Request $request)
    {
        $ip = $request->ip();
        if($ip == '127.0.0.1')
            $ip = "103.217.178.0";
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
                
                // $session = sessions::where('id',session()->getId())->first();
                // dd(session()->getId());
                // $userAgentString = $session->user_agent;
                // $browserInfo = new Parser($userAgentString);
                // $browser = $browserInfo->browser->type . ' ' . $browserInfo->browser->name;
                // $device = $browserInfo->os->name . ' ' . $browserInfo->device->type;

                $userSession = new login_sessions;
                $userSession->user_id = $user->id;
                $userSession->session_id = session()->getId();
                $userSession->device_token = $request->device;
                $userSession->last_seen = now();
                // $userSession->device_info = ucwords($device);
                // $userSession->browser_info = ucwords($browser);
                $userSession->ip = $ip;
                $userSession->save();

                // event(new AfterControllerReturned());
                session()->put('user_login', 1);


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
