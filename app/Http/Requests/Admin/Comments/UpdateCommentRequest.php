<?php

namespace App\Http\Requests\Admin\Comments;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'feedbackComment' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'feedbackComment.required' => 'Vui lòng nhập bình luận'
        ];
    }
}
