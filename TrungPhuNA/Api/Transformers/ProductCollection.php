<?php

namespace TrungPhuNA\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->pro_name,
            'slug'       => $this->pro_slug,
            'avatar'     => pare_url_cms($this->pro_avatar),
            'price'      => $this->pro_price,
            'sale'       => $this->pro_sale,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
