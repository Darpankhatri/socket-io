<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\login_sessions;
use App\Models\User;

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
}
