<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\OrderFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'o_action_id');
    }
}
