@extends('web.layout')

@section('css-files-to-add')
    <link rel="stylesheet" href="{{ asset('assets/css/tasks.css') }}">
@endsection

@section('main')

<div class="row justify-content-center">
    <div class="col-12">
        <div class="dashboard_header mb_50">
            <div class="row">
                <div class="col-lg-6">
                    <div class="dashboard_header_title">
                        <h3> Tasks</h3>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <button class="btn btn-primary"> <i class="ti-plus"></i> New task</button>
                </div>
            </div>
        </div>
    </div>
        @for ($i=0;$i<8;$i++)
        <div class="col-lg-12 my-2">
            <div class="card_box box_shadow draggable-div" draggable="true">
                <span class="badge badge-primary">PRIORITY : {{ $i }}</span>
                <div class="box_body">
                    <p class="f-w-400 ">Task Numero</p>
                    <span class="badge badge-secondary">PROJECT : </span>
                </div>
                
                <div class="text-right">
                    <button class="btn btn-outline-secondary btn-sm">
                        Edit
                    </button>
                    <button class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </div>
            </div>
        </div>
        @endfor
        
    
</div>
@endsection

@section('js-files-to-add')
<script type="javascript" src="{{ asset('assets/js/tasks.js') }}"></script>
@endsection
