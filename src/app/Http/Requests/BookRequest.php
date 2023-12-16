<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'date' => 'required|date|after:today',
            'time' => 'required|after_or_equal:10:00|before_or_equal:21:00',
            'number' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
        'date.required' => '日付を選択してください',
        'date.after' => '翌日以降の日付を選択してください',
        'time.required' => '時間を選択してください',
        'time.after_or_equal' => '営業時間外です',
        'time.before_or_equal' => '営業時間外です',
        'number.required' => '人数を選択してください',
    ];
    }
}
