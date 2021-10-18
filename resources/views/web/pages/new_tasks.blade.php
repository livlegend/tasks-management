@extends('web.layout')

@section('css-files-to-add')
    
@endsection

@section('main')

<div class="row justify-content-center">
    @if ($errors->any())
        <div class="col-12 alert text-white bg-danger d-flex align-items-center justify-content-between" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li class="alert-text">{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ti-close text-white f_s_14"></i>
            </button>
         </div>
    @endif
    
    <div class="col-12">
        <div class="dashboard_header mb_50">
            <div class="row">
                <div class="col-lg-6">
                    <div class="dashboard_header_title">
                        <h3> New Task</h3>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="{{ url('tasks') }}"> Tasks list </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_body">
                <form method="post" action="{{ url('tasks') }}" class="task-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Task name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter task name" required>
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <input type="number" class="form-control" name="priority"  id="priority" placeholder="Enter a priority number" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-9">
                            <label for="task_date">Task date</label>
                            <input type="date" class="form-control" name="task_date" id="task_date" placeholder="Enter task date" required>
                            <small style="display: none;" class="form-text text-danger error-msg">The task datetime must be after actual date</small>
                        </div>

                        <div class="form-group col-lg-3">
                            <label for="time">Task time</label>
                            <input type="time" class="form-control" name="time" id="time" placeholder="00:00" required>
                        </div>
                    </div>
                    <input type="text" name="task_time" id="task-time" style="display: none;">
                    
                    <div class="form-group ">
                        <label for="project">Projet</label>
                        <select id="projet" class="form-control" name="project_id">
                            <option selected="">Choose...</option>
                            @foreach ($projects as $project )
                                <option value="{{ $project->id }}">{{ $project->name }}</option>    
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"  class="btn btn-primary btn-submit">Submit</button>
                </form>
            </div>
        </div>
    </div>        
    
</div>
@endsection

@section('js-files-to-add')
 <script src="{{ asset('assets/js/save_tasks.js') }}"></script>
@endsection
