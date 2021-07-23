<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPortfolioRequest extends FormRequest
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
            'title' => 'required',
            'url' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png',
            'body' => 'required|string|max:100', // 必須・文字列・最大値（10000文字まで）
        ];

    }
    public function messages()
    {
        return [
            'title.required'     => 'タイトルは必須です',
            'url.required'     => 'URLは必須です',
            'image.image' => '画像データをUPしてください',
            'image.mimes' => '形式はjpegまたはpngとしてください',
            'body.required'      => '本文は必須です',
            'body.string'        => '本文は文字列を入力してください',
            'body.max'           => '本文は:100文字以内で入力してください',
        ];
    }
}

