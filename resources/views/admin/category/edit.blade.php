@extends('admin.master')
@section('title','Category Edit')
@section('body')
    <h2 class="title1">Category Edit</h2>
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br>
            <div class="form-body">
                <img width="150px" height="150px" src="{{ asset('/').$category->image }}" alt="">
                {{ Form::open(['method'=>'put','route' => ['admin-categories.update',$category->id],'files'=>true]) }}
                <div class="form-group">
                    {{ Form::label('class', 'Category Image') }}
                    {{ Form::file('image' ,['class'=>'form-control']) }}
                    @if ($errors->has('image'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('class', 'Category Name') }}
                    {{ Form::text('category_name',$category->category_name ,['class'=>'form-control','placeholder'=>'Enter category name']) }}
                    @if ($errors->has('category_name'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('category_name') }}</strong>
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