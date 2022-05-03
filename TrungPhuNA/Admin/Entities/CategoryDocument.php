<?php

namespace TrungPhuNA\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryDocument extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'categories_document';

    protected static function newFactory()
    {
        return \TrungPhuNA\Admin\Database\factories\CategoryDocumentFactory::new();
    }
}
