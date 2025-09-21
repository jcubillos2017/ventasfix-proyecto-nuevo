<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()?->can('create', \App\Models\Product::class) ?? false; }

    public function rules(): array
    {
        return [
            'sku'           => ['required','string','max:64','unique:products,sku'],
            'nombre'        => ['required','string','max:150'],
            'desc_corta'    => ['required','string','max:255'],
            'desc_larga'    => ['required','string'],
            'imagen_url'    => ['required','url','max:255'],
            'precio_neto'   => ['required','integer','min:0'],      // centavos
            'stock_actual'  => ['required','integer','min:0'],
            'stock_minimo'  => ['required','integer','min:0'],
            'stock_bajo'    => ['required','integer','min:0'],
            'stock_alto'    => ['required','integer','min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'sku.unique' => 'El SKU ya existe.',
        ];
    }
}
