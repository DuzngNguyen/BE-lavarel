<?php

namespace TrungPhuNA\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserVerificationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => 'Dữ liệu không được để trống'
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
