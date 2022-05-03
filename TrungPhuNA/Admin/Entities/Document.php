<?php

namespace TrungPhuNA\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(CategoryDocument::class,'category_id');
    }
}
