<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminMenuRequest extends FormRequest
{
    public function rules()
    {
        return [
            'm_name'        => 'required|max:190|min:3',
            'm_slug'        => 'required|unique:menus,m_slug,' . $this->id,
            'm_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'm_name.required'        => 'Dữ liệu không được để trống',
            'm_description.required' => 'Dữ liệu không được để trống',
            'm_slug.required'        => 'Dữ liệu không được để trống',
            'm_slug.unique'          => 'Dữ liệu đã tồn tại',
            'm_name.max'             => 'Dữ liệu không quá 190 ký tự',
            'm_name.min'             => 'Dữ liệu phải nhiều hơn 3 ký tự'
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
