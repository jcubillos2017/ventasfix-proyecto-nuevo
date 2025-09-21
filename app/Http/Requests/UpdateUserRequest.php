<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\VentasfixEmail;

class UpdateUserRequest extends FormRequest
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
        // return $this->user()->can('update', $this->route('user'));
        return true;
    }

    public function rules(): array
    {
        $user = $this->route('user'); // Model binding

        return [
            'rut'      => ['required','string','max:20'],
            'nombre'   => ['required','string','max:100'],
            'apellido' => ['required','string','max:100'],
            'email'    => ['required','email','max:150','unique:users,email,'.$user->id, new VentasfixEmail()],
            // password opcional en update:
            'password' => ['nullable','string','min:8','confirmed'],
        ];
    }

    public function attributes(): array
    {
        return [
            'rut' => 'RUT',
        ];
    }
}
