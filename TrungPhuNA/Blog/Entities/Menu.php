<?php

namespace TrungPhuNA\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'menus';

    protected static function newFactory()
    {
        return \TrungPhuNA\Blog\Database\factories\MenuFactory::new();
    }
}
