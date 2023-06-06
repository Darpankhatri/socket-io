<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Models\sessions;
use App\Models\login_sessions;
use Exception;

class SessionCleanCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sessionClean:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Session Clear Cron Start.");
        try{
            $sessions = sessions::where('user_id',null)->get();

            foreach($sessions as $key => $data)
            {
                if($data->login_session)
                    $data->login_session->delete();
                    
                $data->delete();
            }
            Log::info("Session Clear Cron End.");
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }

    }
}
