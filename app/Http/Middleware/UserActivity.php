<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Cache;
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
            $expiresAt = now()->addMinutes(2); /* keep online for 2 min */
            $records = [
                'last_seen' => now(),
                'device' => session()->getId(),
            ];
            
            Cache::put('user-is-online-' . Auth::user()->id, $records, $expiresAt);
            
            /* last seen */
            login_sessions::where('session_id',session()->getId())->where('user_id', Auth::user()->id)->update(['last_seen' => now()]);
            User::where('id', Auth::user()->id)->update(['last_seen' => now()]);
        }
  
        return $next($request);
    }
}
