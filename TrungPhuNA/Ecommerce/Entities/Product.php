<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'products';

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\ProductFactory::new();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'products_category','pc_product_id','pc_category_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'o_action_id');
    }

    public function variable()
    {
        return $this->belongsTo(ProductImage::class,'pi_product_id');
    }
}
