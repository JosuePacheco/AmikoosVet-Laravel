<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProveedorResource extends JsonResource
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
            , 'nombre' => $this->nombre
            , 'codigopostal' => $this->codigopostal
            , 'direccion' => $this->direccion
            , 'telefono' => $this->telefono
            , 'email' => $this->email
        ];
    }
}
