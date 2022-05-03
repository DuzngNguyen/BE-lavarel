<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keyword extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [''];
    protected $table = 'keywords';

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\KeywordFactory::new();
    }
}
