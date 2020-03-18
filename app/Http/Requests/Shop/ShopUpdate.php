<?php

namespace App\Http\Requests\Shop;

use Illuminate\Foundation\Http\FormRequest;

class ShopUpdate extends FormRequest
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
            'user_id' => 'required|string|max:36',
            'name'  => 'required|string|max:191',
            'image' => 'string|nullable',
            'email' => 'required|email|string',
            'phone' => 'required|string', 
            'web_page' => 'required|string', 
            'kind' => 'required|string', 
            'enabled' => 'required|integer',
            'street' => 'required|string', 
            'neighborhood' => 'required|string', 
            'city' => 'required|string', 
            'long' => 'required','regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/',
            'lat' => 'required','regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/',
            'products_limit' => 'required|integer', 
            'images_limit' => 'required|integer'
        ];
    }
}
