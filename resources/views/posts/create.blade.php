@extends('layouts.default')

@section('title')
New Post

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post') }}" class="header-menu">Back</a>
        New Post
    </h1>
    <form action="{{ url('/post') }}" method="post">
        {{ csrf_field() }}

        <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
            @if ($errors->has('title'))
            <span class="error">{{ $errors->first('title') }}</span>
            @endif
        </p>
        <p>
            <textarea name="content" placeholder="enter title" >{{ old('content') }}</textarea>
            @if ($errors->has('content'))
            <span class="error">{{ $errors->first('content') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Add">
        </p>
    </form>

@endsection