<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAttributeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'a_name' => 'required|max:190|min:2|unique:attributes,a_name,' . $this->id,
            'a_slug' => 'required',
            'a_icon' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'a_name.required' => 'Dữ liệu không được để trống',
            'a_slug.required' => 'Dữ liệu không được để trống',
            'a_icon.required' => 'Dữ liệu không được để trống',
            'a_name.unique'   => 'Dữ liệu đã tồn tại',
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
