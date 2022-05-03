<?php

namespace TrungPhuNA\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdatePasswordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'password.required'  => 'Dữ liệu không được để trống',
            'password.min'       => 'Mật khẩu ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu không khớp',
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
