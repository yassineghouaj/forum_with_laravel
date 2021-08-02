@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="panel-heading">Welcome {{ Auth::user()->name }}</div>
                    <div class="card-header">Add</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('status') }}
                            </div>
                        @elseif(session('failed'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('failed') }}
                            </div>
                        @endif
                        <form action="/index" method="post">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="text" name="title" class="form-control" id="formGroupExampleInput"
                                placeholder="title"><br>
                            <textarea class="form-control" name="body" id="bio" rows="3"></textarea>
                            <input class="btn btn-primary" type='submit' value="AddPost" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{--@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are Admin.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
