<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'        => 'required|unique:roles,name,' . $this->id,
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Dữ liệu không được để trống',
            'description.required' => 'Dữ liệu không được để trống',
            'name.unique'          => 'Dữ liệu đã tồn tại',
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
