<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $table = 'files';
    protected $guarded = [''];

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\FileFactory::new();
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'f_product_id');
    }
}
