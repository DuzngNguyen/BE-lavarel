<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailSuccessOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appName = env('APP_PREFIX');
        return $this->from('codethue94@gmail.com','['.$appName.'] - Tạo mới đơn hàng')
            ->subject('[Thông tin đơn hàng mới]')
            ->view('email.order_success',[
                'transaction' => $this->data
            ]);
    }
}
