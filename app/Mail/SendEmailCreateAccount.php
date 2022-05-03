<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailCreateAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $admin;
    public function __construct($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appName = env('APP_PREFIX');
        return $this->from($this->admin->email,'['.$appName.'] - Tạo mới tài khoản')
            ->subject('[Thông tin tài khoản ] - ' . $this->admin->email)
            ->view('email.account_create', [
                'admin' => $this->admin
            ]);
    }
}
