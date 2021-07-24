@extends('layouts.app')

@section('title')
Profile

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>プロフィール一覧</h2>

            <a href="{{ url('/profile/form' ) }}">
                <span class="btn btn-primary btn-sm">プロフィール作成</span>
            </a>
            <br>

            @if (count($profiles) > 0)
                <br>

                {{--links メソッドでページングが生成される。しかも生成されるHTMLは Bootstrap と互換性がある--}}
                

                <table class="table table-striped">
                    <tr>
                        <th width="120px">profile_id</th>
                        <th width="120px">日付</th>
                        <th>操作</th>
                    </tr>

                    {{--このまま foreach ループにかけることができる--}}
                    @foreach ( $profiles as $profile )
                    <tr>
                        <td>
                            <a href="/profile/{{ $profile->profile_id }}/edit">
                                {{ $profile->profile_id }}
                            </a>
                        </td>
                        <td>{{ $profile->created_at->format('Y/m/d H:i') }}</td>
                        <td>
                            <a href="#" class="del" data-id="{{ $profile->profile_id }}">[✕]</a>
                            <form action="{{ url('/profile', $profile->profile_id) }}" method="post" id="form_{{ $profile->profile_id }}">
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
</div>
    
    <script src="/js/main.js"></script>

@endsection