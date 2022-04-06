<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCheckoutRequest extends FormRequest
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
       
            'email' => 'required|email',

            'phone' => 'required',

            'address' => 'required',

            'name' => 'required'
        ];
    }

    public function messages(){
        return [
    

            'email.required' => 'Email không để trống',
            'email.email' => 'Email không hợp lệ',

            'phone.required' => 'Số điện thoại không để trống',

            'address.required' => 'Địa chỉ không để trống',

            'name.required' =>'Họ tên không để trống'
        ];
    }
}
