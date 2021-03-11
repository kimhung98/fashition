<?php

namespace Core\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditSizeRequest extends FormRequest
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
            'category_id' => 'required',
            'size' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Bạn chưa chọn tên sản phẩm',
            'size.required' => 'Bạn chưa nhập size',
        ];
    }
}
