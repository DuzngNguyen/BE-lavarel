<?php

namespace App\Console\Commands\Import;

use Illuminate\Console\Command;
use TrungPhuNA\Setting\Entities\SettingSidebar;

class ImportSidebarCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sidebar:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import setting sidebar';

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
        $sidebars = public_path().'/json/setting_sidebar.json';
        $sidebars = file_get_contents($sidebars);
        $sidebars = json_decode($sidebars, true) ?? [];
        foreach ($sidebars as $item)
        {
            $this->info("--  Name: ". $item['m_name']);
            SettingSidebar::insert($item);
        }
    }
}
