<?php

namespace TrungPhuNA\Admin\Http\Controllers;

use App\Models\FolderDrive;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Storage;

class AdminDriveController extends Controller
{
    public function index(Request $request)
    {
        $drives = FolderDrive::with('parent:id,name')->orderByDesc('id')
            ->paginate(20);

        $driveService = Storage::disk('google_drive');

        if ($folderId = $request->folder_id)
        {
            $contents = collect($driveService->listContents($folderId, false));

            if ($contents)
            {
                foreach ($contents as $item)
                {
                    $drive = FolderDrive::where('path', $folderId)->first();
                    if ($drive)
                    {
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
                            'parent_id'  => $item['parent_id'] ?? $drive->id,
                            'created_at' => Carbon::now()
                        ]);
                    }
                }
            }
        }

        if ($share = $request->share)
        {
            if ($share === 'file')
            {
                $folder = $request->file;
                $fileShare = FolderDrive::where('basename', $folder)->first();
                if ($fileShare)
                {
                    return $driveService->get($fileShare->path,array("fields"=>"webViewLink"));
                }
            }
        }

        $viewData = [
            'drives' => $drives
        ];

        return view('admin::pages.drive.index', $viewData);
    }
}
