<?php

namespace App\Http\Requests\Admin\Accounting\Design;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:style_design,design_name',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên phong cách thiết kế đã tồn tại'
        ];
    }
}
