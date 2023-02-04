<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'stock' => $this->stock,
            'product_id' => $this->product_id
        ];
    }

    // Data tambahan yang disimpan di bawah data array json
    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('https://productapiurl.com')
        ];
    }
}
