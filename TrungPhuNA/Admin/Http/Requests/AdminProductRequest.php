<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pro_name'        => 'required|max:190|min:3',
            'pro_slug'        => 'required|unique:products,pro_slug,' . $this->id,
            'pro_description' => 'required',
            'categories'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pro_name.required'        => 'Dữ liệu không được để trống',
            'pro_description.required' => 'Dữ liệu không được để trống',
            'pro_slug.required'        => 'Dữ liệu không được để trống',
            'pro_code.required'        => 'Dữ liệu không được để trống',
            'categories.required'      => 'Dữ liệu không được để trống',
            'pro_slug.unique'          => 'Dữ liệu đã tồn tại',
            'pro_name.max'             => 'Dữ liệu không quá 190 ký tự',
            'pro_name.min'             => 'Dữ liệu phải nhiều hơn 3 ký tự'
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
