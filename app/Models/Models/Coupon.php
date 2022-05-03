<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    use HasFactory;
    public $timestamps = false;

    protected $casts = [
        'data' => 'array'
    ];
    protected $guarded = [''];
}
