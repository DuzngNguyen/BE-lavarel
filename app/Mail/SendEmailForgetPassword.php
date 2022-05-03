<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $admin;
    protected $token;

    public function __construct($admin, $token)
    {
        $this->admin = $admin;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appName = env('APP_PREFIX');
        return $this->from('codethue94@gmail.com','['.$appName.'] - Resets mật khẩu mới')
            ->subject('['.$this->admin->email.'] - Link đổi mật khẩu')
            ->view('email.forget_password',[
                'admin' => $this->admin,
                'link' => route('get_admin.verification_password',['token' => $this->token,'email' => $this->admin->email])
            ]);

    }
}
