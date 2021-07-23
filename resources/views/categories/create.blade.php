@extends('layouts.admin')

@section('title')
New Category

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post/category') }}" class="header-menu">Back</a>
        New Category
    </h1>
    <form action="{{ url('/post/category') }}" method="post">
        {{ csrf_field() }}

        <p>
            <input type="text" name="name" placeholder="enter category name" value="{{ old('name') }}">
            @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
            @endif
        </p>
        <p>
            <input type="text" name="display_order" size="20" class="form-control"　value="{{ old('display_order') }}">
            @if ($errors->has('display_order'))
            <span class="error">{{ $errors->first('display_order') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Add">
        </p>
    </form>

@endsection