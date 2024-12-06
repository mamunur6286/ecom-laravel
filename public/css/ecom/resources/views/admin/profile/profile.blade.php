@extends('admin.master')
@section('title','Product Create')
@section('body')
    <h2 class="title1">Profile Update</h2>
    <div class="form-grids  widget-shadow" data-example-id="basic-forms">
        <div class="row">
            {{ Form::open(['method'=>'put','route' => ['admin-profile.update',$admin_profile->id],'files'=>true]) }}
            <div class="form-body">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="text-center">
                        <img src="{{ asset('/').$admin_profile->image }}" width="200px " height="200px" style="border:1px solid gray; border-radius: 100px" alt="">
                    </div>
                    <div class="form-group">
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('image',['class'=>'','placeholder'=>'Enter category name']) }}
                        @if ($errors->has('image'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('class', 'Name') }}
                        {{ Form::text('name', $admin_profile->name ,['class'=>'form-control','placeholder'=>'Enter product name']) }}
                        @if ($errors->has('name'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('class', 'Email') }}
                        {{ Form::text('email', $admin_profile->email ,['class'=>'form-control','placeholder'=>'Enter Your Email']) }}
                        @if ($errors->has('email'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('mobile', 'mobile') }}
                        {{ Form::text('mobile', $admin_profile->mobile ,['class'=>'form-control','placeholder'=>'Enter Your mobile']) }}
                        @if ($errors->has('mobile'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-3"></div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                {{ Form::submit('Update',['class'=>'btn btn-success form-control']) }}
            </div>
            <div class="col-md-4"></div>
        </div>
        {{ Form::close() }}
        <br>
        <br>
        <h4 class="text-center mb-4">Password Change</h4>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 table-responsive">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="list-style: none">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['url'=>['admin-profile/password-update',$admin_profile->id]]) !!}
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td ><span style="margin-top: 10px">Old Password </span></td>
                            <td>{{ Form::password('old_password',['class'=>'form-control']) }}</td>
                        </tr>
                        <tr>
                            <td ><span style="margin-top: 10px">New Password </span></td>
                            <td>{{ Form::password('new_password',['class'=>'form-control']) }}</td>
                        </tr>
                        <tr>
                            <td ><span style="margin-top: 10px">Confirm Password</span> </td>
                            <td>{{ Form::password('confirm_password',['class'=>'form-control']) }}</td>
                        </tr>

                        <tr>
                            <td></td>
                            <td>{{ Form::submit('Update',['class'=>'btn btn-success']) }}</td>
                        </tr>
                    </table>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </div>
@endsection