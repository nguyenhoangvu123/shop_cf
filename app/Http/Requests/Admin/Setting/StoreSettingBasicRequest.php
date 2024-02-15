<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingBasicRequest extends FormRequest
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
            'nameCompany' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'zalo' => 'required',
            'youtube' => 'required',
            'facebook' => 'required',
            'hotline' => 'required',
            'seoKeyword' => 'required',
            'seoDescription' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nameCompany.required' => 'Vui lòng nhập tên công ty',
            'address.required' => 'Vui lòng nhập địa chỉ công ty',
            'email.required' => 'Vui nhập tên email',
            'email.email' => 'Email không đúng định dạng',
            'website.required' => 'Vui nhập tên website',
            'zalo.required' => 'Vui lòng nhập tên zalo',
            'youtube.required' => 'Vui lòng nhập tên youtube',
            'facebook.required' => 'Vui lòng nhập tên facebook',
            'hotline.required' => 'Vui lòng nhập số hotline',
            'logo.required' => 'Vui lòng nhập logo',
            'seoDescription.required' => 'Vui lòng nhập seo mô tả',
            'seoKeyword.required' => 'Vui lòng nhập từ khoá tìm kiếm'
        ];
    }
}
