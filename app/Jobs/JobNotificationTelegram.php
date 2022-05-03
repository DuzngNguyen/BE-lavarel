<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class JobNotificationTelegram implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $content;
    protected $options;
    public function __construct($content, $options)
    {
        $this->content = $content;
        $this->options = $options;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("---- Content: ". $this->content);
        $transaction = $this->options['transaction'];
        $meta     = json_decode($transaction->t_meta, true);
        $message = urlencode($this->content)." [".$transaction->t_email."] ".$transaction->t_note .  ($meta['options']['document'] ?? '');
        $telegram = file_get_contents("https://api.telegram.org/bot1357857207:AAHIaL6cJ9wxcexI3FKks7SlUDDLKF-0sSg/sendMessage?chat_id=-347260350&text=$message");
        Log::info("--------- telegram: ". json_encode($telegram));
    }
}
