<?php

namespace App\Console\Commands\Import;

use Illuminate\Console\Command;
use TrungPhuNA\Ecommerce\Entities\Product;

class ImportContentProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:product-content';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import content';

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
        $content = public_path().'/json/data_content.json';
        $content = file_get_contents($content);
        $content = json_decode($content, true) ?? [];

        $products = Product::all();
        foreach ($products as $product)
        {
            $this->info("Title: ". $product->pro_name);
            if(strpos(strtolower($product->pro_name),'website') != false)
            {
                \DB::table('products')->where('id', $product->id)
                    ->update([
                        'pro_content' => $content['data']
                    ]);
            }
        }
    }
}
