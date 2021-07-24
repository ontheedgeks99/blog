@extends('layouts.default')

@section('title')
My Blog

@endsection

@section('content')

    @forelse($profile_list as $profile)
        <div class="col-md-12">
            <div class="col-md-12">
                <h2>PROFILE</h2>
            </div>
            <div>
                <div class="ql-snow">
                    <div class="ql-editor">
                        {!! $profile->content !!}
                    </div>
                </div>
            </div>
            <p></p>
        </div>
    @empty
        <p>プロフィールがありません</p>
    @endforelse

@endsection
