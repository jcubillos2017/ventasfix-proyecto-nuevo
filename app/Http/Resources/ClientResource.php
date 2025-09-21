<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'rut_empresa'     => $this->rut_empresa,
            'rubro'           => $this->rubro,
            'razon_social'    => $this->razon_social,
            'telefono'        => $this->telefono,
            'direccion'       => $this->direccion,
            'contacto_nombre' => $this->contacto_nombre,
            'contacto_email'  => $this->contacto_email,
            'created_at'      => $this->created_at,
        ];
    }
}
