<?php

namespace TrungPhuNA\Ecommerce\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $guarded = [''];
    protected $table = 'categories';

    protected static function newFactory()
    {
        return \TrungPhuNA\Ecommerce\Database\factories\CategoryFactory::new();
    }

    public static function recursive($categories ,$parents = 0 ,$level = 1 ,&$listCategoriesSort)
    {
        if(count($categories) > 0 )
        {
            foreach ($categories as $key => $value) {
                if($value->c_parent_id  == $parents)
                {
                    $value->level = $level;
                    $listCategoriesSort[] = $value;
                    unset($categories[$key]);
                    $parent = $value->id;

                    self::recursive($categories , $parent ,$level + 1 , $listCategoriesSort);
                }
            }
        }
    }
}
