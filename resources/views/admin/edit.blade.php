@extends('layouts.app')

@section('title')
Edit Post

@endsection

@section('content')
<div class="container">

        <h2>
            <a href="{{ url('/post/list') }}" class="header-menu">戻る</a>
            Edit Post
        </h2>
        
        <form action="{{ url('/post', $post->id) }}" method="post" class="form-group">
            {{ csrf_field() }}
            {{ method_field('patch') }}

            <p>
                <input type="text" class="form-control" name="title" placeholder="enter title" value="{{ old('title',$post->title) }}">
                @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
                @endif
            </p>
            <p>
                <textarea name="content" class="form-control" rows="15" placeholder="enter title" >{{ old('content',$post->content) }}</textarea>
                @if ($errors->has('content'))
                <span class="error">{{ $errors->first('content') }}</span>
                @endif
            </p>
            <!-- <p>
                <div id="editor" style="height: 200px;"></div>
                <input type="hidden" name="content">
                @if ($errors->has('content'))
                <span class="error">{{ $errors->first('content') }}</span>
                @endif
            </p> -->
            <p>
                <input type="submit" value="更新" class="btn btn-primary btn-sm">
            </p>
        </form>
</div>

    <!-- Quillエディタ -->
    <script>
    
        var quill = new Quill('#editor', {
            placeholder: 'Write your question here...',
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