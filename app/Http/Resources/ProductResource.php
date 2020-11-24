<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $product = [
            'id' => $this->Id,
            'title' => $this->Title,
            'image' => $this->MainPictureUrl,
            'price' => $this->Price->ConvertedPriceList->DisplayedMoneys[0]->Price,
            'category_id' => $this->CategoryId,
        ];

        return $product;
    }
}
