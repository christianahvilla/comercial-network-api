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
            'id' => 'required|string|max:36',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|string',
            'phone' => 'required|string|max:12',
            'role' => 'required|string',
            'password' => 'required|string|min:8',
        ];
    }
}
