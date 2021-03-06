<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends ProductIndexResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request) , [
            'variation'=> ProductVariationResource::collection( $this->variations()->with('type')->get()
                ->groupBy('type.name'))
        ]);
    }
}
