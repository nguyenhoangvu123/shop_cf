<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $id = request()->id;
        return [
            'name' => "required|unique:categories,category_name,$id",
            'status' => 'in:0,1',
            'parent' => 'nullable|exists:categories,id',
            'positionShow' => 'required|in:menu,detail,footer'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'name.unique' => 'Tên danh mục đã tồn tại',

            'status.in' => 'Trạng thái không tồn tại',
            'parent.exists' => 'Danh mục cha không tồn tại',

            'positionShow.required' => 'Vui lòng chọn vị trí',
            'positionShow.in' => 'Vị trí không tồn tại'
        ];
    }
}
