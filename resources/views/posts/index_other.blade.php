@extends('layouts.default')

@section('title')
My Blog

@endsection

@section('content')
 
    <h2>{{ $subtitle }}</h2>

    <div class="card-deck">
        @forelse($posts as $post)
        <div class="col-md-4 mt-3">          
            <div class="card w-100">
                <a href="{{ route('front_index', ['id' => $post->id]) }}" class="card-a link">
                    <img class="card-img" src="../storage/photos/{{ $post->image }}">
                    <div class="card-body">
                        <p>
                            {{ $post->title }}
                        </p>
                        <div class="d-flex text-right">
                            <small>
                                &nbsp;{{ $post->created_at->format('Y年m月d日') }}
                            </small>
                        </div>
                    </div>

                </a>
            </div>
        </div>

        @empty
            <p>記事がありません</p>
        @endforelse
    </div>

{{ $posts->links() }}

@endsection
