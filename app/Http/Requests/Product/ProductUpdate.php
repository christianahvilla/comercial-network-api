<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|string|max:36',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'mime:jpeg,png',
            'stock' => 'required|numeric',
        ];
    }
}
