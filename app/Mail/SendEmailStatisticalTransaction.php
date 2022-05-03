<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmailStatisticalTransaction extends Mailable
{
    use Queueable, SerializesModels;

    protected $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $appName = env('APP_PREFIX');
        return $this->from('codethue94@gmail.com','['.$appName.'] - Thông kê')
            ->subject('[Thống kê đơn hàng này] - '. Carbon::today())
            ->view('email.order_success_day',[
                'transactions' => $this->transactions
            ]);
    }
}
