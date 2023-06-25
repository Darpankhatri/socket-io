<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //

    function two_step_verification() {
        return view('web.pages.setting.two-step-verification')->with('title','2-Step Verification');
    }
}
