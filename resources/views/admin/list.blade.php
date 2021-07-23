@extends('layouts.admin')

@section('title')
Edit Category

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>ブログ記事一覧</h2>

            <a href="{{ url('/post/create' ) }}">
                <span class="btn btn-primary btn-sm">新規記事作成</span>
            </a>
            <br>

            @if (count($posts) > 0)
                <br>

                {{--links メソッドでページングが生成される。しかも生成されるHTMLは Bootstrap と互換性がある--}}
                

                <table class="table table-striped">
                    <tr>
                        <th width="120px">記事番号</th>
                        <th width="120px">日付</th>
                        <th>タイトル</th>
                        <th>操作</th>
                    </tr>

                    {{--このまま foreach ループにかけることができる--}}
                    @foreach ( $posts as $post )
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->created_at->format('Y/m/d H:i') }}</td>
                            <td>
                                <a href="/post/{{ $post->id }}/edit">
                                    {{ $post->title }}
                                </a>
                            </td>
                            <td>
                                <a href="#" class="del" data-id="{{ $post->id }}">[✕]</a>
                                <form action="{{ url('/post', $post->id) }}" method="post" id="form_{{ $post->id }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
                <br>
                <p>記事がありません。</p>
            @endif
        </div>
    </div>
    
    <script src="/js/main.js"></script>

@endsection