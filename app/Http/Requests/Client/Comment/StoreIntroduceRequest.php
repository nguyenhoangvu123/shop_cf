<?php

namespace App\Http\Requests\Client\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreIntroduceRequest extends FormRequest
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
            'name' => 'required|max:255',
            'comment' => 'required|max:1000',
            'email' => 'required|max:255|email',
            'phone' => 'required|max:255',
            'postId' => 'required'
        ];
    }
}
