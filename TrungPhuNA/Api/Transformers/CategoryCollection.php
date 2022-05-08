<?php

namespace TrungPhuNA\Api\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryCollection extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->c_name,
            'slug'        => $this->c_slug,
            'icon'        => $this->c_icon,
            'avatar'      => pare_url_cms($this->c_avatar),
            'description' => $this->c_description
        ];
    }
}
