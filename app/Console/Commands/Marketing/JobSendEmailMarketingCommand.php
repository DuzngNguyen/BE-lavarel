<?php

namespace App\Console\Commands\Marketing;

use App\Jobs\JobSendEmailMarketing;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Setting\Entities\Admin;

class JobSendEmailMarketingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marketing:email';

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
        $this->warn("--- Init");
        $users = User::all();
//        $admins = Admin::all();
        foreach ($users as $user)
        {
            try{
                sleep(2);
                $this->info("----- Email: ". $user->email);
                dispatch(new JobSendEmailMarketing($user));
            }catch (\Exception $exception)
            {
                Log::error("[Error JobSendEmailMarketingCommand ]" .json_encode($exception->getMessage()));
            }
        }
    }
}
