<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FAQRCode\Google2FA;
use PragmaRX\Google2FA\Google2FA as Google2FAAuth;

class SettingController extends Controller
{
    //

    function two_step_verification()
    {
        return view('web.pages.setting.two-step-verification')->with('title', '2-Step Verification');
    }

    function generate_qr()
    {
        $user = User::find(Auth::user()->id);
        // Generate secret key for Google Authenticator
        $google2fa = new Google2FA();
        $secretKey = $google2fa->generateSecretKey();

        // Save the secret key in the user's record
        // $user->google2fa_secret = $secretKey;
        // $user->save();

        // Generate the QR code for setup
        $qrCodeUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secretKey
        );
        return response()->json(['qrCode'=>$qrCodeUrl,'secretKey'=>$secretKey]);
    }

    function verify_code(Request $request)
    {
        $google2fa = new Google2FAAuth();

        // Verify 2FA code
        if ($google2fa->verifyKey($request->secret_key, $request->authCode)) {
            return response()->json(['success'=>1,'message'=>'Google Authenticator Activated']);
        }
        return response()->json(['success'=>0,'message'=>'Code Not Match!.']);
    }
}
