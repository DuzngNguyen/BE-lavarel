<?php

namespace App\Console\Commands;

use App\Models\FolderDrive;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Storage;

class CronJobProcessDriveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drive:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawler Data In Drive';

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
        $this->warn("--- init");

        $googleDriveStorage = Storage::disk('google_drive');

        $file = $googleDriveStorage->files->get('1xWhjqY9UM7LSxGksLVNZadredkJrvgqa');

        dd($file);
        $folder   = $contents->where('type', '=', 'dir');
        foreach ($folder as $item) {
            dd($item);
            FolderDrive::updateOrCreate([
                'path' => $item['path'],
            ], [
                'folder_id'  => $item['path'],
                'name'       => $item['name'],
                'path'       => $item['path'],
                'type'       => $item['type'],
                'size'       => $item['size'],
                'basename'   => $item['basename'] ?? null,
                'dirname'    => $item['dirname'] ?? null,
                'mimetype'   => $item['mimetype'] ?? null,
                'extension'  => $item['extension'] ?? null,
                'parent_id'  => $item['parent_id'] ?? 0,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
