<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/22/21 .
 * Time: 10:29 PM .
 */

namespace TrungPhuNA\Ecommerce\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use TrungPhuNA\Ecommerce\Entities\ProductPrice;

class ProductPriceService
{
    public static function getProductsPriceByProductID($productID)
    {
        return ProductPrice::where('pp_product_id', $productID)->get();
    }

    public static function syncProductPrice($productID, $request)
    {
        if ($request->pro_price_name && !empty($request->pro_price_name)) {
            $prices = $request->pro_price_price;
            $ids    = $request->pro_price_id ?? [];

            foreach ($request->pro_price_name as $key => $name) {
                try {
                    if (isset($ids[$key])) {
                        ProductPrice::find($ids[$key])->update([
                            'pp_product_id' => $productID,
                            'pp_price'      => str_replace(',', '', $prices[$key]),
                            'pp_name'       => $name,
                            'updated_at'    => Carbon::now()
                        ]);
                    } else {
                        if($name)
                            ProductPrice::insert([
                                'pp_product_id' => $productID,
                                'pp_price'      => str_replace(',', '', $prices[$key]),
                                'pp_name'       => $name,
                                'created_at'    => Carbon::now()
                            ]);
                    }
                } catch (\Exception $exception) {
                    Log::error("[Error: ] Line - " . $exception->getLine()
                        . " File: " . $exception->getFile()
                        . " Messages: " . $exception->getMessage());
                }
            }
        }
    }
}
