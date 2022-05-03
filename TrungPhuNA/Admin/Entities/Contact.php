<?php

namespace TrungPhuNA\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [];
    
    protected static function newFactory()
    {
        return \TrungPhuNA\Admin\Database\factories\ContactFactory::new();
    }
}
