@extends('layouts.app')

@section('content')

<!--------------->
<h1>id={{$task->id}}のタスク詳細ページ</h1>

<table class="table table-bordered" style="width:100%">
    <tr>
        <th style="width:20%">id</th>
        <td style="width:80%">{{$task->id}}</td>
    </tr>
    <tr>
        <th style="width:20%">状況</th>
        <td style="width:80%">{{$task->status}}</td>
    </tr>
    <tr>
        <th style="width:20%">タスク</th>
        <td style="width:80%">{{$task->content}}</td>
    </tr>
</table>

{!! link_to_route('tasks.edit', '編集', ['task' => $task->id], ['class' => 'btn btn-light']) !!}

{!! Form::model($task,['route'=>['tasks.destroy',$task->id],'method'=>'delete']) !!}
    {!! Form::submit('削除',['class'=>'btn btn-danger']) !!}
{!! Form::close() !!}

<!--------------->

@endsection