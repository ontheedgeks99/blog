@extends('layouts.default')

@section('title')
My Blog

@endsection

@section('content')

        <h2>PORTFOLIO</h2>

        <div class="card-deck">
            @forelse($portfolios as $portfolio)
            <div class="col-md-4 mt-3">          
                <div class="card w-100">
                    <a href="{{ $portfolio->url }}" class="card-a link">
                        <img class="card-img" src="../storage/photos/{{ $portfolio->image }}">
                        <div class="card-body">
                            <p>
                                {{ $portfolio->title }}
                            </p>
                            <div class="d-flex text-right">
                                <small>
                                    &nbsp;{{ $portfolio->created_at->format('Y年m月d日') }}
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

@endsection
