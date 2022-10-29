<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        //|exists:users,mobile
        return [
            "mobile" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|size:11',
            "password" => 'required|string',      
          ];
    }
}
