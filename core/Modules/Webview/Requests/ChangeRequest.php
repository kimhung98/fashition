<?php

namespace Core\Modules\Webview\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeRequest extends FormRequest
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
            'password' => 'required|min:6|max:32',
            'passwordAgain' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Password phải có độ dài từ 3 đến 32 ký tự',
            'password.max' => 'Password phải có độ dài từ 3 đến 32 ký tự',
            'passwordAgain.required' => 'Bạn chưa nhập phần nhập lại password',
            'passwordAgain.same' => 'Password không trùng khớp',
        ];
    }
}
