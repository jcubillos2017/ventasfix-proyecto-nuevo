<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool { return $this->user()?->can('update', $this->route('product')) ?? false; }

    public function rules(): array
    {
        $productId = $this->route('product')->id ?? null;

        return [
            'sku'           => ['required','string','max:64', Rule::unique('products','sku')->ignore($productId)],
            'nombre'        => ['required','string','max:150'],
            'desc_corta'    => ['required','string','max:255'],
            'desc_larga'    => ['required','string'],
            'imagen_url'    => ['required','url','max:255'],
            'precio_neto'   => ['required','integer','min:0'],
            'stock_actual'  => ['required','integer','min:0'],
            'stock_minimo'  => ['required','integer','min:0'],
            'stock_bajo'    => ['required','integer','min:0'],
            'stock_alto'    => ['required','integer','min:0'],
        ];
    }
}
