<?php

namespace TrungPhuNA\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'pages';
    protected $guarded = [''];

    protected static function newFactory()
    {
        return \TrungPhuNA\Admin\Database\factories\PageFactory::new();
    }
}
