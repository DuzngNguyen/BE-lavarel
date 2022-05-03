<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'products_type';

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\ProductTypeFactory::new();
    }
}
