<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Services\CrudService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.pages.projects')
               ->with('projects',Project::with('tasks')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.pages.new_project');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        return (new CrudService())->store($request->all(), new Project()) ? 
            view('web.pages.projects')
            ->with('save_project',true)
            ->with('projects',Project::with('tasks')->get())
            : Redirect::back()->withErrors(['msg'=>'An error ocurs while saving']);
    }


    
}
