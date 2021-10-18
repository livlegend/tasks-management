<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\CrudService;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('web.pages.tasks')
                ->with('tasks',Task::with('project')->get());
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('web.pages.new_tasks')
                ->with('projects',Project::all());
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(TaskRequest $request)
    {
        return (new CrudService())->store($request->all(), new Task()) ? 
            view('web.pages.tasks')
            ->with('save_task',true)
            ->with('tasks',Task::with('project')->get())
            : Redirect::back()->withErrors(['msg'=>'An error ocurs while saving']);
        
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function edit(Task $task)
    {
        return  view('web.pages.edit_task')
                ->with('task',$task)
                ->with('projects',Project::all());
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Task  $task
    * @return \Illuminate\Http\Response
    */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        return (new CrudService())->update($request->all(), $task) ? 
            view('web.pages.tasks')
            ->with('update_task',true)
            ->with('tasks',Task::with('project')->get())
            : Redirect::back()->withErrors(['msg'=>'An error ocurs while updating']);
    }
    /**
    * Update the drag and drop performed.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function updateDrags(Request $request){
        return (new CrudService())->updateSwap($request->all());
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Task  $task
    * @return boolean
    */
    public function destroy(Task $task)
    {
        return (new CrudService())->delete($task);
    }
}
