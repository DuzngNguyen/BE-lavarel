<?php

namespace App\Console\Commands\Transaction;

use App\Jobs\JobEmailStatisticalTransaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Ecommerce\Entities\Transaction;
use TrungPhuNA\Setting\Helpers\FilterHelper;

class JobEmailStatisticalTransactionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:job-success-day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $transactions = Transaction::all();
//        foreach ($transactions as $item)
//        {
//            $time = $item->created_at->format('Y-m-d');
//            $this->info("---------- Created_at: ". $item->created_at);
//            $transaction = Transaction::find($item->id);
//            $transaction->t_time_process = $time;
//            $transaction->save();
//
//            $this->info("---------- Date: ". $time);
//        }

        $transactions = Transaction::whereDate('t_time_process', Carbon::today())->get();
        if (!$transactions->isEmpty())
        {
            dispatch(new JobEmailStatisticalTransaction($transactions));
        }else{
            Log::info("[------- ]" . Carbon::today() . '  - Không có đơn hàng nào');
        }
    }
}
