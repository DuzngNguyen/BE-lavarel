<?php

namespace App\Console\Commands\Create;

use Illuminate\Console\Command;
use TrungPhuNA\Ecommerce\Entities\Product;

class CreateCsdlCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:product';

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
        foreach (        Product::all() as $item)
        {
            $this->info("----: ". $item->pro_name);
            Product::find($item->id)->update([
                'pro_number' => 1000
            ]);
        }
    }
}
