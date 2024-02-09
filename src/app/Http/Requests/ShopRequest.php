<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
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
            'area' => 'required|string',
            'genre' => 'required|string',
            'shop' => 'required|string|max:50',
            'detail' => 'required|string|max:400',
            'img' => 'required|file|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'area.required' => '入力必須です',
            'area.string' => '文字列を入力してください',
            'genre.required' => '入力必須です',
            'genre.string' => '文字列を入力してください',
            'shop.required' => '入力必須です',
            'shop.string' => '文字列を入力してください',
            'shop.max' => '50文字以内で入力してください',
            'detail.required' => '入力必須です',
            'detail.string' => '文字列を入力してください',
            'detail.max' => '400文字以内で入力してください',
            'img.required' => '入力必須です',
            'img.mimes' => 'ファイル形式はjpeg,jpgまたはpngを選択してください',
        ];
    }
}
