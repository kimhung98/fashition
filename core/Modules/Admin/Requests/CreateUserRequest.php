<?php

namespace Core\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:32',
            'passwordAgain' => 'required|same:password',
            'power' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'email.required' => 'Bạn chưa nhập địa chỉ email',
            'email.email' => 'Email chưa đúng định dạng',
            'power.required' => 'Bạn chưa chọn phân quyền người dùng',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Password phải có độ dài từ 3 đến 32 ký tự',
            'password.max' => 'Password phải có độ dài từ 3 đến 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập phần nhập lại password',
            'passwordAgain.same' => 'Password không trùng khớp',
        ];
    }
}
