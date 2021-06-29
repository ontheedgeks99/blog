<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:3',
            'content' => 'required'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'タイトルを入力してください。',
            'title.min' => 'タイトルは3文字以上としてください。',
            'content.required' => '内容を入力してください。'
        ];
    }
}
