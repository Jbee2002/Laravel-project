<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
            'password' => 'required',
            'comfirm_password' => 'required|same:password',

            'email' => 'required|email|unique:customers',

            'phone' => 'required|unique:customers',

            'address' => 'required',

            'name' => 'required'
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Mật khẩu không để trống',
            'comfirm_password.required' => 'Nhập lại mật khẩu ở trên',
            'comfirm_password.same' => 'Nhập lại mật khẩu không chính xác',

            'email.required' => 'Email không để trống',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng',

            'phone.required' => 'Số điện thoại không để trống',
            'phone.unique' => 'Số điện thoại đã được sử dụng',

            'address.required' => 'Địa chỉ không để trống',

            'name.required' =>'Họ tên không để trống'
        ];
    }
}
