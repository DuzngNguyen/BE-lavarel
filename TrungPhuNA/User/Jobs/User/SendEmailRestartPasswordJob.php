<?php

namespace TrungPhuNA\User\Jobs\User;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use TrungPhuNA\User\Emails\User\SendEmailRestartPassword;

//use Mail;


class SendEmailRestartPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = $this->data['user'];
        $link = $this->data['link'];

        Mail::send('common::email.user.password_reset', ['user' => $user,'link' => $link], function ($on) use ($user) {
            $on->from('codethue94@gmail.com', '[123code.net]');
            $on->to($user->email)->subject('[123code.net] Reset mật khẩu tài khoản');
        });
    }
}
