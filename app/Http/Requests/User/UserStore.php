<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStore extends FormRequest
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
            'id' => 'required|unique|string|max:36',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique|email|string',
            'phone' => 'required|unique|string|max:12',
            'password' => 'required|unique|string|min:8',
        ];
    }
}
