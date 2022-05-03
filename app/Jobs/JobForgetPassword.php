<?php

namespace App\Jobs;

use App\Mail\SendEmailForgetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class JobForgetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $admin;
    protected $token;

    public function __construct($admin, $token)
    {
        $this->admin = $admin;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $email     = new SendEmailForgetPassword($this->admin, $this->token);
        Mail::to($this->admin->email)
//            ->cc($emailSend)
            ->send($email);

        Log::info("----------- Admin: " . json_encode($this->admin));
        Log::info("----------- resets: " . json_encode($this->token));
    }
}
