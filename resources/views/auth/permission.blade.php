@extends('adminlte/app')

@section('title', 'Create Permissions')

@section('content')

@if ( session('message') )
<div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('message') }}
</div>
@endif
@if ( session('fail') )
<div class="alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('fail') }}
</div>
@endif

<div class="container">
    <div class="rows">
        <div class="col-xs-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center" >CREATE PERMISSIONS</div>
                <div class="panel-body">
                    {!! Form::open(array('url' => 'make_permission', 'method' => 'POST')) !!}
                        
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="input-group">
                            <input type="text" class="form-control" name="permission">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Create</button>
                            </span>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection