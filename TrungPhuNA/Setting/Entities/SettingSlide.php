<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingSlide extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'settings_slide';
    protected $guarded = [''];

    protected static function newFactory()
    {
        return \TrungPhuNA\Setting\Database\factories\SettingSlideFactory::new();
    }
}
