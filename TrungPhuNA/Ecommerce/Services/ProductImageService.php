<?php
/**
 * Created by PhpStorm .
 * User: trungphuna .
 * Date: 4/23/21 .
 * Time: 1:16 AM .
 */

namespace TrungPhuNA\Ecommerce\Services;


use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use TrungPhuNA\Ecommerce\Entities\ProductImage;

class ProductImageService
{
    public static function getImagesByProductID($productID)
    {
        return ProductImage::where("pi_product_id", $productID)
            ->get();
    }

    /**
     * @param $productID
     * @param $images
     * @return false
     */
    public static function syncProductImages($productID, $images)
    {
        if (!empty($images)) {
            foreach ($images as $key => $fileImage) {
                try{
                    $ext    = $fileImage->getClientOriginalExtension();
                    $extend = [
                        'png', 'jpg', 'jpeg', 'PNG', 'JPG'
                    ];

                    if (!in_array($ext, $extend)) return false;

                    $filename = date('Y-m-d__') . Str::slug($fileImage->getClientOriginalName()) . '.' . $ext;
                    $path     = public_path() . '/uploads/' . date('Y/m/d/');
                    if (!\File::exists($path)) {
                        mkdir($path, 0777, true);
                    }

                    $fileImage->move($path, $filename);
                    \DB::table('products_images')
                        ->insert([
                            'pi_name'       => $fileImage->getClientOriginalName(),
                            'pi_path'       => $filename,
                            'pi_product_id' => $productID,
                            'created_at'    => Carbon::now()
                        ]);
                }catch (\Exception $exception)
                {
                    Log::error("[Error: ] Line - " . $exception->getLine()
                        . " File: " . $exception->getFile()
                        . " Messages: " . $exception->getMessage());
                }
            }
        }
    }

    /**
     * @param $imageID
     */
    public static function deleteImageItem($imageID)
    {
        ProductImage::find($imageID)->delete();
    }
}
