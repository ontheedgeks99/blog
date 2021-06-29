@extends('layouts.default')

@section('title')
{{ $post->title }}

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post') }}" class="header-menu">Back</a>
        {{ $post->title }}</h1>
    <p>{!! nl2br(e($post->content)) !!}</p>

@endsection