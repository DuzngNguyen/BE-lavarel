<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderDrive extends Model
{
    use HasFactory;
    protected $table = 'folders_drive';
    protected $guarded = [''];

    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }
}
