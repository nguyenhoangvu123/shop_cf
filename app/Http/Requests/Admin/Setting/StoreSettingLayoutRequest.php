<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingLayoutRequest extends FormRequest
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
            'title' => 'required|unique:config_layouts,config_name',
            'category' => 'nullable|exists:categories,id',
            'image' => 'nullable|file',
            'status' => 'required|in:0,1',
            'typeShow' => 'nullable|in:0,1',
            'listPost' => 'nullable|array',
            'typeSlick' => 'required|in:0,1,2'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.unique' => 'Tên cấu hình đã tồn tại',
            'category.exists' => 'Danh mục không tồn tại',
            'image.file' => 'file ảnh không đúng định dạng',
            'status.in' => 'trạng thái không tồn tại',
            'typeShow.in' => 'Hiện thị không tồn tại',
            'typeSlick.required' => 'Vui lòng chọn di chuyển',
            'typeSlick.in' => 'Kiểu di chuyển không tồn tại'
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'listPost' => $this->listPost ?  explode(',', $this->listPost) : [],
        ]);
    }
}
