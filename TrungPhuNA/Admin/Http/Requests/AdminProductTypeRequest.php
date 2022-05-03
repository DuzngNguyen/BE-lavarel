<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pt_name' => 'required',
            'pt_slug' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pt_name.required' => 'Dữ liệu không được để trống',
            'pt_slug.required' => 'Dữ liệu không được để trống'
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
