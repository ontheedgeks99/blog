@extends('layouts.default')

@section('title')
My Blog

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post/create') }}" class="header-menu">New Post</a>
        MyBlog
    </h1>
    <ul>
    @forelse( $posts as $post)
        <li>
            <a href="/post/{{ $post->post_id }}">{{ $post->title }}</a>
            <a href="/post/{{ $post->post_id }}/edit" class="edit">[Edit]</a>
            <a href="#" class="del" data-id="{{ $post->post_id }}">[✕]</a>
            <form action="{{ url('/post', $post->post_id) }}" method="post" id="form_{{ $post->post_id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            </form>
        </li>
    @empty
        <li>No posts yet</li>
    @endforelse
    </ul>
    <script src="/js/main.js"></script>

@endsection