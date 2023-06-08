<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\login_sessions;
use App\Models\User;
use Stevebauman\Location\Facades\Location;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        $user = User::find(Auth::user()->id);
        $userSession = login_sessions::where('user_id', $user->id)->where('session_id', session()->getId())->delete();
        Auth::logout();
        return redirect()->route('home')->with('message','Logout successfully');
    }

    public function online_user()
    {
        $users = User::all();
        return view('users',compact('users'));
    }

    public function get_sessions()
    {
        $userSession = login_sessions::where('user_id', Auth::user()->id)->orderBy('last_seen','desc')->get();
        $body = '';
        foreach ($userSession as $key => $session) {
            $location = Location::get($session->ip);
            $body .= '<li class="list-group-item">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5>'.$session->device_info.' ⋅ '.$location->cityName.', '.$location->countryName.'</h5>
                                <p>'.Carbon::parse($session->last_seen)->diffForHumans().' ⋅ '.$session->browser_info.'</p>
                            </div>';
                            if($key == 0)
                                $body .= '
                                    <div class="col-auto">
                                        <span class="text-primary extra-small">Current</span>
                                    </div>';
                        $body .= '
                        </div>
                    </li>';
        }

        return response()->json(['success'=>'1','body'=>$body]);
    }
}
