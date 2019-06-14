@extends('admin.master')
@section('title','Slider Create')
@section('body')
    <h2 class="title1">Slider Create</h2>
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br>
            <div class="form-body">
                {{ Form::open(['route' => 'sliders.store','files'=>true]) }}

                <div class="form-group">
                    {{ Form::label('class', 'Slider Name') }}
                    {{ Form::text('name', old('name') ,['class'=>'form-control','placeholder'=>'Enter slider name']) }}
                    @if ($errors->has('name'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('class', 'Slider Image') }}
                    {{ Form::file('image' ,['class'=>'form-control']) }}
                    @if ($errors->has('image'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                </div>

                {{ Form::submit('Save',['class'=>'btn btn-success']) }}
                {{ Form::close() }}
            </div>
            <br>
        </div>
        <div class="col-md-3"></div>

    </div>
@endsection