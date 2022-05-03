<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminKeywordRequest extends FormRequest
{
    public function rules()
    {
        return [
            'k_name'        => 'required|max:190|min:3',
            'k_slug'        => 'required|unique:keywords,k_slug,' . $this->id,
            'k_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'k_name.required'        => 'Dữ liệu không được để trống',
            'k_description.required' => 'Dữ liệu không được để trống',
            'k_slug.required'        => 'Dữ liệu không được để trống',
            'k_slug.unique'          => 'Dữ liệu đã tồn tại',
            'k_name.max'             => 'Dữ liệu không quá 190 ký tự',
            'k_name.min'             => 'Dữ liệu phải nhiều hơn 3 ký tự'
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
