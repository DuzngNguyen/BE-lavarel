<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'products_category';
    protected $guarded = [''];

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\ProductCategoryFactory::new();
    }
}
