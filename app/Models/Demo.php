<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;
    protected $table = 'demo';
    protected $guarded = [''];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->code = str_pad($model->id,5,'0',STR_PAD_LEFT);
        });
    }
}
