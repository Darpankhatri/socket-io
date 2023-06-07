<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cache;
use App\Models\User;
use App\Models\sessions;
use WhichBrowser\Parser;
use App\Models\login_sessions;
use Illuminate\Support\Facades\Log;

class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            
            if(session()->get('user_login')){
                $session = sessions::where('id',session()->getId())->first();

                $userAgentString = $session->user_agent;
                $browserInfo = new Parser($userAgentString);
                $browser = $browserInfo->browser->type . ' ' . $browserInfo->browser->name;
                $device = $browserInfo->os->name . ': ' . $browserInfo->device->type;

                $userSession = login_sessions::where('session_id',session()->getId())->first();
                $userSession->device_info = ucwords($device);
                $userSession->browser_info = ucwords($browser);
                $userSession->save();
                
                Log::info("Login Successfully");

                session()->forget('user_login');
            }

            $expiresAt = now()->addMinutes(2); /* keep online for 2 min */
            $userSession = login_sessions::where('session_id',session()->getId())->first();
            $records = [
                'browser' => $userSession->browser_info,
                'device' => $userSession->device_info,
            ];
            Cache::put('user-is-online-' . Auth::user()->id, $records, $expiresAt);
            
            /* last seen */
            login_sessions::where('session_id',session()->getId())->where('user_id', Auth::user()->id)->update(['last_seen' => now()]);
            User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        }
        return $next($request);
    }
}
