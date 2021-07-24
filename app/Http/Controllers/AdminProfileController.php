<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminProfileRequest;
use App\Models\Profile;

class AdminProfileController extends Controller
{

    public function index(Profile $profile)
    {

        //新しいものから取得
        $profiles = $profile->latest()->get();

        return view('profile.list', ['profiles' => $profiles]);
    }

    public function form()
    {
        return view('profile.form');
    }

    function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function post(AdminProfileRequest $request)
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

        $this->profile->content = $request->body;
        $this->profile->image = $filename;
        $this->profile->save();

        return redirect()->route('profile_form')->with('message','プロフィールを保存しました');

    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', ['profile' => $profile]);
    }

    public function update(AdminProfileRequest $request, Profile $profile){

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

        $profile->content = $request->body;
        $profile->image = $filename;
        $profile->save();
        return redirect('/profile');
    }

    public function delete(Profile $profile){
        $profile->delete();
        return redirect('/profile');
    }


}