<?php

namespace Core\Modules\Webview\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCartRequest extends FormRequest
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
            'size' => 'required',
            'qty' => 'required',
            'color' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'size.required' => 'Bạn chưa chọn size',
            'color.required' => 'Bạn chưa chọn màu',
            'qty.required' => 'Bạn chưa chọn số lượng sản phẩm',
        ];
    }
}
