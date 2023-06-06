<?php

namespace App\Listeners;

use App\Events\AfterControllerReturned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\sessions;
use App\Models\login_sessions;
use WhichBrowser\Parser;
use Illuminate\Support\Facades\Log;

class ProcessAfterControllerReturned
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\AfterControllerReturned  $event
     * @return void
     */
    public function handle(AfterControllerReturned $event)
    {
        //
        Log::info("login event run");
        $session = sessions::where('id',session()->getId())->first();
        if($session){
            $userAgentString = $session->user_agent;
            $browserInfo = new Parser($userAgentString);
            $browser = $browserInfo->browser->type . ' ' . $browserInfo->browser->name;
            $device = $browserInfo->os->name . ' ' . $browserInfo->device->type;
    
            $login_sessions = login_sessions::where('session_id',session()->getId())->first();
            $login_sessions->device_info = ucwords($device);
            $login_sessions->browser_info = ucwords($browser);
            $login_sessions->save();
            Log::info("yes");
        }
        else{
            Log::info("no ". session()->getId());
        }
        Log::info('event end');
    }
}
