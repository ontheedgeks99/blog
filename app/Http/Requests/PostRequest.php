<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

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
        // 現在実行しているアクション名を取得
        // アクション名により、どのルールを使うのか場合分けをしておく
        $action = $this->getCurrentAction();

        $rules['store'] = [
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'file|image|mimes:jpg,jpeg,png'
        ];

        $rules['editCategory'] = [
            'category_id' => 'integer|min:1|nullable',
            'name' => 'required|string|max:255',
            'display_order' => 'required|integer|min:1'
        ];

        $rules['deleteCategory'] = [
            'category_id' => 'required|integer|min:1'
        ];

        return array_get($rules, $action, []);
        
    }

    public function messages() {
        return [
            'title.required' => 'タイトルを入力してください。',
            'title.min' => 'タイトルは3文字以上としてください。',
            'content.required' => '内容を入力してください。',
            'image.mimes' => '形式はjpegまたはpngとしてください',
            'category_id.required' => 'カテゴリーIDは必須です',
            'category_id.integer' => 'カテゴリーIDは整数としてください',
            'category_id.min' => 'カテゴリーIDは1以上としてください',
            'name.required' => 'カテゴリ名は必須です',
            'name.string' => 'カテゴリ名は文字列を入力してください',
            'name.max' => 'カテゴリ名は255文字以内で入力してください',
            'display_order.required' => '表示順は必須です',
            'display_order.integer' => '表示順は整数を入力してください',
            'display_order.min' => '表示順は1以上を入力してください',
        ];
    }

    /**
     * 現在実行中のアクション名を返す
     */
    public function getCurrentAction()
    {
        // 実行中のアクション名を取得
        // App\Http\Controllers\AdminBlogController@post のような返り値が返ってくるので @ で分割
        $route_action = Route::currentRouteAction();
        list(, $action) = explode('@', $route_action);
        return $action;
    }

}
