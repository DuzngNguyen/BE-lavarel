<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTagRequest extends FormRequest
{
    public function rules()
    {
        return [
            't_name'        => 'required|max:190|min:3',
            't_slug'        => 'required|unique:tags,t_slug,' . $this->id,
            't_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            't_name.required'        => 'Dữ liệu không được để trống',
            't_description.required' => 'Dữ liệu không được để trống',
            't_slug.required'        => 'Dữ liệu không được để trống',
            't_slug.unique'          => 'Dữ liệu đã tồn tại',
            't_name.max'             => 'Dữ liệu không quá 190 ký tự',
            't_name.min'             => 'Dữ liệu phải nhiều hơn 3 ký tự'
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
