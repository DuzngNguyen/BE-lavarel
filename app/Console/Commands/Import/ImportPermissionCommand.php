<?php

namespace App\Console\Commands\Import;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;

class ImportPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:create-seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create permission config';

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
        $this->info("-- init create permission");

        $permissions = public_path().'/json/permission.json';
        $permissions = file_get_contents($permissions);
        $permissions = json_decode($permissions, true) ?? [];
        foreach ($permissions as $permission)
        {
            $name = $permission['name'];
            $check = Permission::where('name', $name)->first();
            if( !$check)
            {
                $permission['created_at'] = Carbon::now();
                Permission::create($permission);
            }
            dump($permission);
        }
    }
}
