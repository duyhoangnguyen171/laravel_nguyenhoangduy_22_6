<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
            'category_id' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên dạnh mục không để trống!',
            'detail.required' => 'Thông tin sản phẩm không để trống!',
            'price.required' => 'Giá không để trống!',
        ];
    }
}
