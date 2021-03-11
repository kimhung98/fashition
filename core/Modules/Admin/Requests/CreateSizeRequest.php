<?php

namespace Core\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSizeRequest extends FormRequest
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
            'size' => 'required|unique:sizes,size,NULL,id,category_id,' . $this->category_id,
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Bạn chưa chọn thể loại sản phẩm',
            'size.required' => 'Bạn chưa nhập size',
            'size.unique' => 'Bạn nhập size đã tồn tại',
        ];
    }
}
