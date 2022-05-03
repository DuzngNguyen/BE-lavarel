<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'account'  => 'required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'account.required' => 'Dữ liệu không được để trống',
            'password.unique'  => 'Dữ liệu đã tồn tại'
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
