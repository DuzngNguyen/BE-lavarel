<?php

namespace TrungPhuNA\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductItemRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pi_name'        => 'required|max:190|min:3',
            'pi_slug'        => 'required',
            'pi_description' => 'required',
            'pi_product_id'  => 'required',
            'pi_content'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'pi_name.required'        => 'Dữ liệu không được để trống',
            'pi_description.required' => 'Dữ liệu không được để trống',
            'pi_slug.required'        => 'Dữ liệu không được để trống',
            'pi_product_id.required'  => 'Dữ liệu không được để trống',
            'pi_content.required'     => 'Dữ liệu không được để trống',
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
