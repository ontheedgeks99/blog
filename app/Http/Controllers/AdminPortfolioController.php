<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPortfolioRequest;
use App\Models\Portfolio;

class AdminPortfolioController extends Controller
{
  
    function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }

    /**
     * ポートフォリオ入力フォーム
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form()
    {
        return view('portfolio.form');
    }

    public function post(AdminPortfolioRequest $request, Portfolio $portfolio)
    {

        $filename = '';
        $image = $request->file('image');
        if( isset($image) === true ){
            // 拡張子を取得
            $ext = $image->guessExtension();
            // アップロードファイル名は[ランダム文字列20文字].[拡張子]
            $filename = sha1(uniqid(rand(), true)) . ".{$ext}";
            // publicディレクトリ(storage/app/public/)のphotosディレクトリに保存
            $path = $image->storeAs('photos', $filename, 'public');
        }

        $this->portfolio->title = $request->title;
        $this->portfolio->url = $request->url;
        $this->portfolio->body = $request->body;
        $this->portfolio->image = $filename;
        $this->portfolio->save();

        return redirect()->route('portfolio_form')->with('message','ポートフォリオを保存しました');

    }
}
