<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'roles' => 'required',
            'password_re'=>'required',
            


        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên thành viên không để trống!',
            'username.required' => 'Tên đăng nhập không để trống!',
            'gender.required' => 'Giới tính không để trống!',
            'phone.required' => 'Số điện thoại không để trống!',
            'email.required' => 'Email không để trống không để trống!',
            'roles.required' => 'Roles không để trống!',
            'password_re.required' => 'Hãy xác nhận password!',
        ];
    }
}
