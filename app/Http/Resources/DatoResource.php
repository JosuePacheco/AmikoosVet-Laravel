<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DatoResource extends JsonResource
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
            'id' => $this->id
            , 'venta_id' => $this->venta_id
            , 'cantidad' => $this->cantidad
            , 'total' => $this->total
        ];
    }
}
