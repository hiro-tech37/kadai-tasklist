@extends('layouts.app')

@section('content')

<!--------------->
@if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show',$task->id,['task'=>$task->id]) !!}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{--create新規作成へのリンク--}}
    {!! link_to_route('tasks.create','新規タスク投稿',[],['class'=>'btn btn-primary']) !!}

<!--------------->

@endsection