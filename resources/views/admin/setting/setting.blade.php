@extends('admin.master')
@section('title','Setting Edit')
@section('body')
    <h2 class="title1">Setting Edit</h2>
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <br>
            <div class="form-body">
                {{ Form::open(['method'=>'put','route' => ['setting.update',$setting->id],'files'=>true]) }}
                <div class="form-group">
                    {{ Form::label('logo', 'Logo Image') }}
                    {{ Form::file('header_logo' ,['class'=>'form-control']) }}
                    @if ($errors->has('header_logo'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('header_logo') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('banner', 'Banner Image') }}
                    {{ Form::file('banner' ,['class'=>'form-control']) }}
                    @if ($errors->has('banner'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('banner') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('referal_amount', 'Referal Amount') }}
                    {{ Form::text('referal_amount', $setting->referal_amount ,['class'=>'form-control','placeholder'=>'Enter referal amount']) }}
                    @if ($errors->has('referal_amount'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('referal_amount') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('active_amount', 'Active Amount') }}
                    {{ Form::text('active_amount', $setting->active_amount ,['class'=>'form-control','placeholder'=>'Enter active amount']) }}
                    @if ($errors->has('active_amount'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('active_amount') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', $setting->address ,['class'=>'form-control','placeholder'=>'Enter footer address']) }}
                    @if ($errors->has('address'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('mobile', 'Mobile') }}
                    {{ Form::text('mobile', $setting->mobile ,['class'=>'form-control','placeholder'=>'Enter referal amount']) }}
                    @if ($errors->has('mobile'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::text('email', $setting->email ,['class'=>'form-control','placeholder'=>'Enter email']) }}
                    @if ($errors->has('email'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    {{ Form::label('bkash_no', 'Bkash No') }}
                    {{ Form::text('bkash_no', $setting->bkash_no ,['class'=>'form-control','placeholder'=>'Enter Bkash No']) }}
                    @if ($errors->has('bkash_no'))
                        <span class="help-block text-danger">
                                <strong>{{ $errors->first('bkash_no') }}</strong>
                            </span>
                    @endif
                </div>

                {{ Form::submit('Update',['class'=>'btn btn-success']) }}
                {{ Form::close() }}
            </div>
            <br>
        </div>
        <div class="col-md-3"></div>

    </div>
@endsection