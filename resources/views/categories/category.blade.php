@extends('layouts.app')

@section('title')
New Portfolio

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>カテゴリ一覧</h2>
                
                <a href="{{ url('/post/category/create' ) }}">
                    <span class="btn btn-primary btn-sm">新規カテゴリ作成</span>
                </a>
                <br>

                @if (count($category) > 0)
                <br>
                {{ $category->links() }}
                <table class="table table-striped">
                    <tr>
                        <th>カテゴリ番号</th>
                        <th>カテゴリ名</th>
                        <th>表示順</th>
                        <th>操作</th>
                    </tr>
                @foreach ($category as $category)
                    <tr data-category_id="{{ $category->category_id }}">
                        <td>
                            <span class="category_id">{{ $category->category_id }}</span>
                        </td>
                        <td>
                            <a href="/post/category/{{ $category->category_id }}/edit">
                                <span class="name">{{ $category->name }}</span>
                            </a>
                        </td>
                        <td>
                            <span class="display_order">{{ $category->display_order }}</span>
                        </td>
                        <td>
                            <a href="#" class="del" data-id="{{ $category->category_id }}">[✕]</a>
                            <form action="/post/category/{{ $category->category_id }}" method="post" id="form_{{ $category->category_id }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                            </form>
                        </td>
                    </tr>
                @endforeach
                </table>

                @else
                <br>
                <p>カテゴリがありません。</p>
                @endif
                
            </div>
        </div>
    </div>
   
    <script src="/js/main.js"></script>

@endsection