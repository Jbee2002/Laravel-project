<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'category_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'upload' => [
                'required',
                'mimes:jpeg,jpg,png,gif,bmp'
            ]
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Tên sản phẩm không để trống',
            'name.unique' => 'Tên sản phẩm đã được sử dụng',

            'upload.required' => 'File không để trống',
            'upload.mimes' => 'Định dạng File không hợp lệ',

            'category_id.required' => 'Danh mục không để trống',
            'price.required' => 'Giá sản phẩm không để trống'
        ];
    }
}
