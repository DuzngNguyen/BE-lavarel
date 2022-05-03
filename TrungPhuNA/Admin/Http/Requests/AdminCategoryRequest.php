<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'c_name'        => 'required|max:190|min:3',
            'c_slug'        => 'required|unique:categories,c_slug,' . $this->id,
            'c_code'        => 'required|unique:categories,c_code,' . $this->id,
            'c_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'c_name.required'        => 'Dữ liệu không được để trống',
            'c_description.required' => 'Dữ liệu không được để trống',
            'c_slug.required'        => 'Dữ liệu không được để trống',
            'c_code.required'        => 'Dữ liệu không được để trống',
            'c_slug.unique'          => 'Dữ liệu đã tồn tại',
            'c_code.unique'          => 'Dữ liệu đã tồn tại',
            'c_name.max'             => 'Dữ liệu không quá 190 ký tự',
            'c_name.min'             => 'Dữ liệu phải nhiều hơn 3 ký tự'
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
