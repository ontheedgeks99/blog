@extends('layouts.admin')

@section('title')
Edit Category

@endsection

@section('content')
    <h1>
        <a href="{{ url('/post/category') }}" class="header-menu">Back</a>
        Edit Category
    </h1>

    <form action="{{ url('/post/category', $category->category_id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('patch') }}

        <p>
            <input type="text" name="name" class="form-control" value="{{ old('name',$category->name) }}">
            @if ($errors->has('name'))
            <span class="error">{{ $errors->first('name') }}</span>
            @endif
        </p>
        <p>
            <input type="text" name="display_order" size="20" class="form-control"　value="{{ old('display_order',$category->display_order) }}">
            @if ($errors->has('display_order'))
            <span class="error">{{ $errors->first('display_order') }}</span>
            @endif
        </p>
        <p>
            <input type="submit" value="Update">
        </p>
    </form>

@endsection