<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'rate' => 'required|integer',
            'comment' => 'required|string|max:400',
            'img' => 'mimes:jpg,jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'rate.required' => '入力必須です',
            'comment.required' => '入力必須です',
            'comment.string' => '文字列を入力してください',
            'comment.max' => '400文字以内で入力してください',
            'img.mimes' => 'ファイル形式はjpg、jpeg、pngのみです'
        ];
    }
}
