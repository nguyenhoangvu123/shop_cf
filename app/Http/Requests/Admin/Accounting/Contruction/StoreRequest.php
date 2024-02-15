<?php

namespace App\Http\Requests\Admin\Accounting\Contruction;

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

    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:type_contruction,contruction_name',
            'listAttrCategory' => 'required|array',
            'listAttrCategory.*.name' => 'required',
            'listAttrCategory.*.price' => 'required',
            'listAttrCategory.*.is_default' => 'required|in:0,1',
            'listAttrCategory.*.id_desgin' => 'required|exists:style_design,id',
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên tầng loại công trình đã tồn tại'
        ];
    }
}
