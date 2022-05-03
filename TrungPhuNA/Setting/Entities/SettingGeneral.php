<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingGeneral extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'settings_general';

    protected static function newFactory()
    {
        return \TrungPhuNA\Setting\Database\factories\SettingGeneralFactory::new();
    }
}
