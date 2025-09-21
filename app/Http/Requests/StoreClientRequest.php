<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RutChileno;
use App\Models\Client;
class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        // return $this->user()->can('create', Client::class);
        return true;
    }

     protected function prepareForValidation(): void
    {
 $rut = strtoupper(trim((string) $this->rut_empresa));
        $rut = preg_replace('/[^0-9K]/', '', $rut); // deja solo dígitos y K

        // Inserta guion antes del DV si no lo trae.
        if (preg_match('/^(\d{1,12})([0-9K])$/', $rut, $m)) {
            $rut = $m[1] . '-' . $m[2];
        }

        $this->merge(['rut_empresa'=> $rut,
            'rubro'           => trim((string) $this->rubro),
            'razon_social'    => trim((string) $this->razon_social),
            'telefono'        => trim((string) $this->telefono),
            'direccion'       => trim((string) $this->direccion),
            'contacto_nombre' => trim((string) $this->contacto_nombre),
            'contacto_email'  => strtolower(trim((string) $this->contacto_email)),
        ]);
    }
    public function rules(): array
    {
        return [
            'rut_empresa'     => ['required','string','max:20','unique:clients,rut_empresa', new RutChileno()],
            'rubro'           => ['required','string','max:150'],
            'razon_social'    => ['required','string','max:255'],
            'telefono'        => ['required','string','max:50'],
            'direccion'       => ['required','string','max:255'],
            'contacto_nombre' => ['required','string','max:150'],
            'contacto_email'  => ['required','email','max:150'],
        ];
    }

    public function attributes(): array
    {
        return [
            'rut_empresa' => 'RUT empresa',
        ];
    }
}
