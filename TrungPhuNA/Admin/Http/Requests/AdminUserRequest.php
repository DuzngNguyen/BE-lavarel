<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    public function rules()
    {
        return [
//            'name'    => 'required|max:190|min:3',
            'email'   => 'required|unique:users,email,' . $this->id,
//            'phone'   => 'required',
        ];
    }

    public function messages()
    {
        return [
//            'name.required'    => 'Dữ liệu không được để trống',
            'email.required'   => 'Dữ liệu không được để trống',
//            'phone.required'   => 'Dữ liệu không được để trống',
            'email.unique'     => 'Dữ liệu đã tồn tại',
//            'name.max'         => 'Dữ liệu không quá 190 ký tự',
//            'name.min'         => 'Dữ liệu phải nhiều hơn 3 ký tự'
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
