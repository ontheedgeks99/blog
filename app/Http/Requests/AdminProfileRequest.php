<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class AdminProfileRequest extends FormRequest
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
            'image' => 'file|image|mimes:jpg,jpeg,png',
            'body' => 'required|string|max:10000', // 必須・文字列・最大値（10000文字まで）
        ];
    }

    public function messages()
    {
        return [
            'image.image' => '画像データをUPしてください',
            'image.mimes' => '形式はjpegまたはpngとしてください',
            'body.required' => '内容は必須です',
            'body.string' => '内容は文字列を入力してください',
            'body.max' => '本文は:10000文字以内で入力してください',
        ];
    }
}
