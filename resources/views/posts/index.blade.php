@extends('layouts.default')

@section('title')
Assist Hon

@endsection

@section('content')

        @forelse($posts as $post)
                <div class="col-md-12 arrow">
                    &nbsp;{{ $post->created_at->format('Y年m月d日') }}
                </div>
                <div class="col-md-12">
                    <h2>{{ $post->title }}</h2>
                </div>

                <div class="col-md-12">
                    <img src="../storage/photos/{{ $post->image }}" class="img-fluid">
                </div>
                <div>
                    <div class="ql-snow">
                        <div class="ql-editor">
                          {!! $post->content !!}
                        </div>
                    </div>
                </div>
                <p></p>
        @empty
            <p>記事がありません</p>
        @endforelse

        {{ $posts->links() }}
    

@endsection
