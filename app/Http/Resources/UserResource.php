<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'       => $this->id,
            'rut'      => $this->rut,
            'nombre'   => $this->nombre,
            'apellido' => $this->apellido,
            'email'    => $this->email,
            'created_at' => $this->created_at,
        ];
    }
}
