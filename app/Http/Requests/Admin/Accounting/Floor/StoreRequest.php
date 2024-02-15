<?php

namespace App\Http\Requests\Admin\Accounting\Floor;

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
            'name' => 'required|max:255|unique:floors,floor_name',
            'listAttrFloor' => 'required|array',
            'listAttrFloor.*.floor_attr_name' => 'required',
            'listAttrFloor.*.value_expense' => 'required',
            'listAttrFloor.*.value_desgin' => 'required',
            'type' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên tầng đã tồn tại'
        ];
    }
}
