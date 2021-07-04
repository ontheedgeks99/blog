@extends('layouts.default')

@section('title')
{{ $post->title }}

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post') }}" class="header-menu">Back</a>
        {{ $post->title }}</h1>
    <p>{!! nl2br(e($post->content)) !!}</p>

    <h2>Comments</h2>
    <ul>
    @forelse( $post->comments as $comment)
        <li>
            {{ $comment->content }}
            <a href="#" class="del" data-id="{{ $comment->id }}">[✕]</a>
            <form action="/post/{{ $post->id }}/comments/{{ $comment->id }}" method="post" id="form_{{ $comment->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            </form>
        </li>
    @empty
        <li>No comments yet</li>
    @endforelse
    </ul>
    <form action="/post/{{ $post->id }}/comments" method="post">
        {{ csrf_field() }}

        <p>
            <input type="text" name="content" placeholder="enter comment" value="{{ old('content') }}">
            @if ($errors->has('content'))
            <span class="error">{{ $errors->first('content') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Add Comment">
        </p>
    </form>
    <script src="/js/main.js"></script>


@endsection