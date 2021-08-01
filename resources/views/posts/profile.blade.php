@extends('layouts.default')

@section('title')
Assist Hon

@endsection

@section('content')

    @forelse($profile_list as $profile)
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
    @empty
        <p>プロフィールがありません</p>
    @endforelse

@endsection
