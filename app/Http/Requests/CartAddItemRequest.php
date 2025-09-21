<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartAddItemRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'product_id' => ['required','integer','exists:products,id'],
            'cantidad'   => ['required','integer','min:1','max:10000'],
        ];
    }
}
