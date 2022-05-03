<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/26/21 .
 * Time: 1:32 AM .
 */

namespace TrungPhuNA\Ecommerce\Services;


use TrungPhuNA\Ecommerce\Entities\ProductCategory;

class ProductCategoryService
{
    public static function syncProductCategory($productID, $categories)
    {
        if(!empty($categories))
        {
            ProductCategory::where('pc_product_id', $productID)->delete();
            foreach ($categories as $item)
            {
                ProductCategory::insert([
                    'pc_product_id' => $productID,
                    'pc_category_id' => $item
                ]);
            }
        }
    }

    public static function getListCategoryByProductId($productID)
    {
        return ProductCategory::where('pc_product_id', $productID)->pluck('pc_category_id')->toArray();
    }
}
