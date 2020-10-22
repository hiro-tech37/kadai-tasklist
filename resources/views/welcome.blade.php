@extends('layouts.app')

@section('content')

    @if (Auth::check())
        {{ Auth::user()->name }}
        <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('tasks.index')
        </div>
    
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the TaskList</h1>
                <div>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-primary']) !!}
                </div>
            </div>
        </div>
    @endif
@endsection