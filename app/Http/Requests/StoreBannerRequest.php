<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'link' => 'required',
            'position' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không để trống!',
            'link.required' => 'Hãy thêm link liên kết!',
            'position.required' => 'Vị trí không được để trống!',
        ];
    }
}
