<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VentasfixEmail; 
use Illuminate\Support\Str;
class StoreUserRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'rut'      => trim((string) $this->rut),
            'nombre'   => trim((string) $this->nombre),
            'apellido' => trim((string) $this->apellido),
            'email'    => strtolower(trim((string) $this->email)),
        ]);
    }
    public function authorize(): bool
    {
        // Si se usa policies, puedes chequear aquí: return $this->user()->can('create', User::class);
        return true;
    }

    public function rules(): array
    {
        return [
            'rut'      => ['required','string','max:20'],
            'nombre'   => ['required','string','max:100'],
            'apellido' => ['required','string','max:100'],
            'email'    => ['required','email','max:150','unique:users,email', new VentasfixEmail()],
            'password' => ['required','string','min:8','confirmed'],
        ];
    }

    public function attributes(): array
    {
        return [
            'rut' => 'RUT',
        ];
    }
}
