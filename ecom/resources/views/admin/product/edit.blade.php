@extends('admin.master')
@section('title','Product Edit')
@section('body')
    <h2 class="title1">Product Edit</h2>
    <div class="form-grids  widget-shadow" data-example-id="basic-forms">
        <div class="text-center">
            <br>
            <img width="180px" height="200px" src="{{ asset('/').$product->image }}" alt="image">

        </div>
        <div class="row">
            {{ Form::open(['method'=>'put','route' => ['admin-products.update',$product->id],'files'=>true]) }}
            <div class="form-body">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('image', 'Product Image') }}
                        {{ Form::file('image',['class'=>'form-control']) }}
                        @if ($errors->has('image'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('class', 'Product Name') }}
                        {{ Form::text('product_name', $product->product_name ,['class'=>'form-control','placeholder'=>'Enter product name']) }}
                        @if ($errors->has('product_name'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('product_name') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('class', 'Retail Price') }}
                        {{ Form::text('retail_price', $product->retail_price ,['class'=>'form-control','placeholder'=>'Enter product price']) }}
                        @if ($errors->has('retail_price'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('retail_price') }}</strong>
                                </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('class', 'Wholesale Price') }}
                        {{ Form::text('wholesale_price', $product->wholesale_price ,['class'=>'form-control','placeholder'=>'Enter wholesale price']) }}
                        @if ($errors->has('wholesale_price'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('wholesale_price') }}</strong>
                                </span>
                        @endif
                    </div><div class="form-group">
                        {{ Form::label('class', 'Wholesale Qnty') }}
                        {{ Form::text('wholesale_qnty', $product->wholesale_qnty ,['class'=>'form-control','placeholder'=>'Enter wholesale quantity']) }}
                        @if ($errors->has('wholesale_qnty'))
                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('wholesale_qnty') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('class', 'Description') }}
                        {{ Form::textarea('description', $product->description ,['class'=>'form-control','placeholder'=>'Enter product description','rows'=>8]) }}
                        @if ($errors->has('description'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('unit', 'Product unit') }}
                        {{ Form::text('unit', $product->unit ,['class'=>'form-control','placeholder'=>'Enter product unit']) }}
                        @if ($errors->has('unit'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('unit') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {{ Form::label('slug', 'Select Category') }}
                        {{ Form::select('slug',$category_select,$product->slug,['class'=>'form-control']) }}
                        @if ($errors->has('slug'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
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
        <br>
    </div>
@endsection