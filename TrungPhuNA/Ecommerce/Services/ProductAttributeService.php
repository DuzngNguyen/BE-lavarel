<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/22/21 .
 * Time: 5:51 PM .
 */

namespace TrungPhuNA\Ecommerce\Services;


use TrungPhuNA\Ecommerce\Entities\ProductAttibute;

class ProductAttributeService
{
    public static function syncProductAttribute($productID, $attributes = [])
    {
        if(!empty($attributes))
        {
            ProductAttibute::where('pa_product_id', $productID)->delete();
            foreach ($attributes as $item)
            {
                ProductAttibute::insert([
                    'pa_product_id' => $productID,
                    'pa_attribute_id' => $item
                ]);
            }
        }
    }

    public static function getListAttributeByProductId($productID)
    {
        return ProductAttibute::where('pa_product_id', $productID)->pluck('pa_attribute_id')->toArray();
    }
}
