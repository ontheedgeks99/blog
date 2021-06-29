@extends('layouts.default')

@section('title')
Edit Post

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post') }}" class="header-menu">Back</a>
        Edit Post
    </h1>
    <form action="{{ url('/post', $post->post_id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title',$post->title) }}">
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
        </p>
        <p>
            <textarea name="content" placeholder="enter title" >{{ old('content',$post->content) }}</textarea>
            @if ($errors->has('content'))
            <span class="error">{{ $errors->first('content') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Update">
        </p>
    </form>

@endsection