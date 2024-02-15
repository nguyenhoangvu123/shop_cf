<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:255',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
            'image' => 'nullable|file'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề bài viết',
            'title.max' => 'Nhập tối đa 255 kí tự',

            'category.required' => 'Vui lòng chọn danh mục',
            'category.exists' => 'Danh mục không tồn tại',

            'description.required' => 'Vui lòng nhập mô tả',

            'image.file' => 'File không đúng định dạng'
        ];
    }
}
