<?php

namespace App\Jobs;

use App\Mail\SendEmailStatisticalTransaction;
use App\Mail\SendEmailSuccessOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class JobEmailStatisticalTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $transactions;
    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email     = new SendEmailStatisticalTransaction($this->transactions);
//        $emailSend = env('EMAIL_SEND_ORDER', 'codethue94@gmail.com');

        $emailSend = env('EMAIL_SEND_ORDER', 'codethue94@gmail.com');
        $emailSend = explode(',', $emailSend);

        Mail::to('codethue94@gmail.com')
            ->cc($emailSend)
            ->send($email);
    }
}
