@extends('admin.master')
@section('title','Product Create')
@section('body')
    <h2 class="title1">Send message User</h2>
    <div class="form-grids  widget-shadow" data-example-id="basic-forms">
        <div class="row">
            {{ Form::open(['route' => 'user-contact.store','files'=>true]) }}
            <div class="form-body">

                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('class', 'Your message') }}
                        {{ Form::textarea('message', null,['class'=>'form-control','placeholder'=>'Enter your message','rows'=>8]) }}
                        {{ Form::hidden('user_id', $id) }}
                        @if ($errors->has('message'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3"></div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                {{ Form::submit('Send',['class'=>'btn btn-success form-control']) }}
            </div>
            <div class="col-md-3"></div>
        </div>
        {{ Form::close() }}
        <br>
        <br>
        <br>
    </div>
@endsection