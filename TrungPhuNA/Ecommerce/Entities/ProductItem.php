<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'products_item';

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\ProductItemFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'pi_product_id');
    }
}
