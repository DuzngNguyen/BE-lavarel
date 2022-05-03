<?php

namespace TrungPhuNA\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingEmail extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'settings_email';

    protected static function newFactory()
    {
        return \TrungPhuNA\Setting\Database\factories\SettingEmailFactory::new();
    }
}
