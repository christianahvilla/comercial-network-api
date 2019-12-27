<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|string|max:36',
            'category_id' => 'required|string|max:36',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'mimes:jpeg,png',
            'stock' => 'required|numeric',
        ];
    }
}
