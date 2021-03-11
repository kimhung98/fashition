<?php

namespace Core\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditRepositoryRequest extends FormRequest
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
            'product_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'Bạn chưa chọn sản phẩm',
            'size.required' => 'Bạn chưa chọn size',
            'color.required' => 'Bạn chưa chọn màu',
            'quantity.required' => 'Bạn chưa nhập số lượng ',
        ];
    }
}
