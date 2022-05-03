<?php

namespace App\Jobs;

use App\Mail\SendEmailSuccessOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobEmailSuccessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return \App\Mail\JobEmailSuccessOrder
     */
    public function handle()
    {
        $email     = new SendEmailSuccessOrder($this->data);
        $emailSend = env('EMAIL_SEND_ORDER', 'codethue94@gmail.com');
        $emailSend = explode(',', $emailSend);

        Mail::to('codethue94@gmail.com')
            ->cc($emailSend)
            ->send($email);
    }
}
