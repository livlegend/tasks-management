@extends('web.layout')

@section('css-files-to-add')
    <link rel="stylesheet" href="{{ asset('assets/css/tasks.css') }}">
@endsection

@section('main')

<div class="row justify-content-center">
    @isset($save_task)
    <div class=" col-12 alert text-white bg-success d-flex align-items-center justify-content-between" role="alert">
        <div class="alert-text">New task saved !</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti-close text-white f_s_14"></i>
        </button>
     </div>
    @endisset

    @isset($update_task)
    <div class=" col-12 alert text-white bg-success d-flex align-items-center justify-content-between" role="alert">
        <div class="alert-text">Task update done !</div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ti-close text-white f_s_14"></i>
        </button>
     </div>
    @endisset

    <div class="col-12">
        <div class="dashboard_header mb_50">
            <div class="row">
                <div class="col-lg-6">
                    <div class="dashboard_header_title">
                        <h3> Tasks</h3>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-primary" href="{{ url('tasks/create') }}"> <i class="ti-plus"></i> New task</a>
                </div>
            </div>
        </div>
    </div>
        @if (sizeof($tasks) > 0)
            @foreach ($tasks as $task)
            <div class="col-lg-12 my-2">
                <div class="card_box box_shadow draggable-div" draggable="true" id='box_{{ $task->id }}'>
                    {{-- <span class="badge badge-primary">PRIORITY : {{ $task->priority }}</span> --}}
                    <div class="box_body">
                        <p class="f-w-400" style="font-size: larger;"> {{ $task->name }}; at  {{ date('d-m-Y H:i',strtotime($task->task_time)) }}</p>
                        <span class="badge badge-secondary">PROJECT : {{ ($task->project) ? $task->project->name :' - ' }}</span>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-outline-secondary btn-sm" href="{{ url('tasks/'.$task->id.'/edit') }}">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="deleteTask({{ $task->id }})">
                            Delete
                        </button>
                        <input type="text" style="display: none;" name="replaced_id" value="{{ $task->id }}">
                    </div>
                </div>
            </div>
            @endforeach
        @else
        <div class="alert text-white bg-warning d-flex align-items-center justify-content-between" role="alert">
            <div class="alert-text">No task available ! </div>
            
         </div>
        @endif
 
</div>
@endsection

@section('js-files-to-add')
<script src="{{ asset('assets/js/tasks.js') }}"></script>

<script type="text/javascript">
    function deleteTask(id){
        if(confirm('Do you really want to delete this task?')){
            $.ajax({
                type:'DELETE',
                url:' {{ url("tasks") }}/'+id,  
                data: {"_token": "{{ csrf_token() }}"},
                success:function(data) {
                    if(data)
                        location.reload();
                },
                error: function(data) {
                    console.log('error',data)
                    alert('error')
                }
            });
        }
    }

    function updateDrags(dragged_id,dropped_id){
        $.ajax({
                type:'POST',
                url:' {{ url("tasks/drags-update") }}',  
                data: {"_token": "{{ csrf_token() }}","dragged_id":dragged_id, "dropped_id":dropped_id},
                success:function(data) {
                    console.log('updated')
                },
                error: function(data) {
                    console.log('error',data)
                    alert('error ! Update not done')
                }
            });
        }
    
</script>
@endsection
