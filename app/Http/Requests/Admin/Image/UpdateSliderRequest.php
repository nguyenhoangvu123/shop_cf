<?php

namespace App\Http\Requests\Admin\Image;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
        $listRequest = request()->all();
        $role =  [
            'image' => 'nullable',
        ];

        if ($listRequest['isDeleteImage'] == 'true') {
            $role['image'] = 'required';
        }

        return $role;
    }

    public function messages()
    {
        return [
            'image.required' => 'Vui lòng chọn ảnh'
        ];
    }
}
