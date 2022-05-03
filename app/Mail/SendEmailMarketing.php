<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailMarketing extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appName = env('APP_PREFIX');
        return $this->from('codethue94@gmail.com','['.$appName.'] - Danh sách tài liệu')
            ->subject('[Danh sách bộ tài liệu, đề thi giáo án mới nhất] - 2022')
            ->view('email.marketing.document',[]);
    }
}
