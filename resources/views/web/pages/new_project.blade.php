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
                        <h3> New Project</h3>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <a href="{{ url('projects') }}"> Projects list </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_body">
                <form method="post" action="{{ url('projects') }}" class="task-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Project name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter project name" required>
                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
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
