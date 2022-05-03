<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingSidebar extends Model
{
    use HasFactory;

    protected $table = 'menu_sidebars';

    protected $guarded = [''];
}
