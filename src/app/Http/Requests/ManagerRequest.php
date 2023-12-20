<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ManagerRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email'), 'max:191'],
            'password' => ['required', Password::defaults()],
            'role' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須です',
            'name.string' => '文字列で入力してください',
            'name.max' => '191文字以内で登録してください',
            'email.required' => '入力必須です',
            'email.string' => '文字列で入力してください',
            'email.email' => 'メール形式で入力してください',
            'email.unique' => 'このメールアドレスは既に登録されています',
            'email.max' => '191文字以内で登録してください',
            'password.required' => '入力必須です',
            'role.required' => '入力必須です',
            'role.string' => '文字列で入力してください',
        ];
    }
}
