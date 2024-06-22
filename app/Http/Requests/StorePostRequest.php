<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required',
            'detail' => 'required',
            

        ];
    }
    public function messages(): array
    {
        return [
            'title.required' => 'Tên bài viết không để trống!',
            'detail.required' => 'Chi tiết bài viết không để trống!',
        ];
    }
}
