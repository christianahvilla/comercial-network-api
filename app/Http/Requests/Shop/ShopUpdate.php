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
            'image' => 'required|string', 
            'email' => 'required|email|string',
            'phone' => 'required|string', 
            'web_page' => 'required|string', 
            'kind' => 'required|string', 
            'enabled' => 'required|integer',
            'street' => 'required|string', 
            'neighborhood' => 'required|string', 
            'city' => 'required|string', 
            'long' => 'required|decimal', 
            'lat' => 'required|decimal', 
            'products_limit' => 'required|integer', 
            'images_limit' => 'required|integer'
        ];
    }
}
