<?php

namespace TrungPhuNA\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'tags';

    protected static function newFactory()
    {
        return \TrungPhuNA\Blog\Database\factories\TagFactory::new();
    }
}
