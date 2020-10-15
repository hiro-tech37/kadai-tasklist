<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;    // 追加

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //view
        
        $tasks = Task::all();
        
        return view('tasks.index',['tasks'=>$tasks]);
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //新規作成view
        
        $task = new Task;
        
        return view('tasks.create',['task'=>$task]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //バリデーション
        $request->validate([
            'status'=>'required|max:10',
            'content'=>'required|max:255']);
        
        //新規作成createの処理
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //個別詳細view
        $task = Task::findOrFail($id);
        
        return view('tasks.show',['task'=>$task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //編集view
        $task = Task::findOrFail($id);
        
        return view('tasks.edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //バリデーション
        $request->validate([
            'status'=>'required|max:10',
            'content'=>'required|max:255']);
        
        //編集editの処理
        $task = Task::findOrFail($id);
        $task->status=$request->status;
        $task->content=$request->content;
        $task->save();
        
        return redirect('/');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //削除btn
        $task = Task::findOrFail($id);
        $task->delete();
        
        return redirect('/');
    }
}
