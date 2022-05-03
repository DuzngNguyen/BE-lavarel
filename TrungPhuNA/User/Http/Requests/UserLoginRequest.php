<?php

namespace TrungPhuNA\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'    => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'  => 'Dữ liệu không được để trống',
            'password.unique' => 'Dữ liệu đã tồn tại'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
