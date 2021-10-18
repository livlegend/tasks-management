@extends('web.layout')

@section('css-files-to-add')
@endsection

@section('main')

<div class="row justify-content-center">
    @isset($save_project)
    <div class=" col-12 alert text-white bg-success d-flex align-items-center justify-content-between" role="alert">
        <div class="alert-text">New project saved !</div>
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
                        <h3> Projects</h3>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn-primary" href="{{ url('projects/create') }}"> <i class="ti-plus"></i> New Project</a>
                </div>
            </div>
        </div>
    </div>
        @if (sizeof($projects) > 0)
            @foreach ($projects as $project)
            <div id="accordion" style="width: 100%">
                <div class="card">
                  <div class="card-header" id="heading{{ $project->id }}">
                    <h5 class="mb-0">
                      <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{ $project->id }}" aria-expanded="true" aria-controls="collapseOne">
                        {{ $project->name }}
                      </button>
                    </h5>
                  </div>
              
                  <div id="collapse{{ $project->id }}" class="collapse" aria-labelledby="heading{{ $project->id }}" data-parent="#accordion">
                    <div class="card-body">
                        <ul>
                            @foreach ($project->tasks as $task)
                                <li>Task priority {{ $task->priority }}: {{ $task->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                  </div>
                </div>
             </div>
            @endforeach
        @else
        <div class="alert text-white bg-warning d-flex align-items-center justify-content-between" role="alert">
            <div class="alert-text">No Project available ! </div>
            
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
    function saveChanges(){
    //    console.log('dragged', dragged_id)
    //    console.log('dropped', dropped_id)
    }

</script>
@endsection
