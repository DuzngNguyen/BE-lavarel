<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/30/21 .
 * Time: 11:45 AM .
 */

namespace TrungPhuNA\Ecommerce\Services;


use TrungPhuNA\Ecommerce\Entities\ProductTypeMultyple;

class ProductTypeService
{
    public static function syncProductType($productID, $types)
    {
        if (!empty($types)) {
            ProductTypeMultyple::where('ptm_product_id', $productID)->delete();
            foreach ($types as $item) {
                ProductTypeMultyple::insert([
                    'ptm_product_id' => $productID,
                    'ptm_type_id'    => $item
                ]);
            }
        }
    }

    public static function getProductsTypeProductID($productID)
    {
        return ProductTypeMultyple::where('ptm_product_id', $productID)->pluck('ptm_type_id')->toArray();
    }
}
