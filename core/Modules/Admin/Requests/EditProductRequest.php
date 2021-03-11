<?php

namespace Core\Modules\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
        $arr = [
            'name' => 'required',
            'price' => 'required',
            'price_sale' => 'required',
            'highlights' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ];

        if ($this->images != null) {
            $arr['images'] = 'required';
        }
        return $arr;
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'price.required' => 'Bạn chưa nhập giá sản phẩm',
            'price_sale.required' => 'Bạn chưa nhập giảm giá',
            'highlights.required' => 'Bạn chưa chọn nổi bật',
            'gender_id.required' => 'Bạn chưa chọn giới tính',
            'brand_id.required' => 'Bạn chưa chọn nhãn hiệu',
            'category_id.required' => 'Bạn chưa chọn thể loại',
            'short_description.required' => 'Bạn chưa nhập mô tả ngắn',
            'description.required' => 'Bạn chưa nhập mô tả',
        ];
    }
}
