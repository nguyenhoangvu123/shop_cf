<?php

namespace App\Http\Requests\Admin\Accounting\Design;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = $this->id;
        return [
            'name' => "required|max:255|unique:style_design,design_name,$id",
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên phong cách thiết kế đã tồn tại'
        ];
    }
}
