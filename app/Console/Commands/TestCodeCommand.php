<?php

namespace App\Console\Commands;

use App\Models\Demo;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TestCodeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:code';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test code';

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
        $this->info("====");
    }
}
