@extends('layouts.app')

@section('title')
New Profile

@endsection

@section('content')

<div class="container">

    <h2>
        <a href="{{ url('/profile') }}" class="header-menu">戻る</a>
        Edit Profile
    </h2>

    @if (session('message'))
        <div class="alert alert-success">
            {{--セッションヘルパーを使ってキーを指定して、セッションに保存されたデータを取り出す--}}
            {{ session('message') }}
        </div>
        <br>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                {{--foreach 文によるループ--}}
                {{--エラーメッセージがあるなら、それを全て取り出して表示--}}
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/profile', $profile->profile_id ) }}" method="post" name="ansform" enctype="multipart/form-data" class="form_group">
        {{ csrf_field() }}
        {{ method_field('patch') }}
        <p>
            <textarea name="body" class="form-control" rows="15" placeholder="enter title" >{{ old('content',$profile->content) }}</textarea>
        </p>
        <!-- <p>
            <div id="editor" style="height: 200px;"></div>
            <input type="hidden" name="body">
        </p> -->
        <p>
            プロフィール写真：<input type="file" name="image">
        </p>
        <p>
            <input type="submit" value="送信" name="subbtn" class="btn btn-primary btn-sm">
        </p>
    </form>
</div>

    <!-- Quillエディタ -->
    <script>
    
        var quill = new Quill('#editor', {
            placeholder: 'Write your profile here...',
            theme: 'snow',
            modules: {
                syntax: true,
                toolbar: [
                //見出し
                [{
                    'header': [1, 2, 3, 4, 5, 6, false]
                }],
                //フォント種類
                [{
                    'font': []
                }],
                //フォントの大きさ
                [{ 'size': ['small', false, 'large', 'huge'] }],
                //文字寄せ
                [{
                    'align': []
                }],
                //太字、斜め、アンダーバー
                ['bold', 'italic', 'underline'],
                //文字色
                [{
                        'color': []
                    },
                    //文字背景色
                    {
                        'background': []
                    }
                ],
                // リスト
                [{
                        'list': 'ordered'
                    },
                    {
                        'list': 'bullet'
                    }
                ],
                //インデント
                [{
                    'indent': '-1'
                }, {
                    'indent': '+1'
                }],
                //画像挿入
                ['image'],
                //動画
                ['video'],
                //数式
                ['formula'],
                //URLリンク
                ['link'],
                ['code-block']
                ]
            }
        });
        // 回答フォームを送信
        document.ansform.subbtn.addEventListener('click', function() {
        // Quillのデータをinputに代入
        document.querySelector('input[name=content]').value = document.querySelector('.ql-editor').innerHTML;
        // 送信
        document.ansform.submit();
        });
    </script>


@endsection