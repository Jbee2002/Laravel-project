<?php

namespace App\Http\Requests\Banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'upload' => [
                'required',
                'mimes:jpeg,jpg,png,gif,bmp'
            ]
        ];
    }

    public function messages(){
        return [
            'upload.required' => 'File không để trống',
            'upload.mimes' => 'Định dạng File không hợp lệ'
        ];

    }
}
