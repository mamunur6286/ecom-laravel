@extends('fontend.master')
@section('title','Shataj-Ecommerce || Register')
@section('body')
    <!-- CONTENT -->
    <div id="page-content">
        <div class="login-form">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color">Contact</span> Us
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! Form::open(['route'=>'contacts.store','file'=>true]) !!}
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('name','',['class'=>'validate']) }}
                            <label for="name">Full Name  <span style="color: red">*</span></label>
                            @error('name')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div><div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('mobile','',['class'=>'validate']) }}
                            <label for="mobile">Mobile  <span style="color: red">*</span></label>
                            @error('mobile')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('email','',['class'=>'validate']) }}
                            <label for="name">Email</label>
                            @error('email')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::textarea('message','',['style'=>'border:0px solid gray;border-bottom:1px solid gray','rows'=>'6']) }}
                            <label for="message">Message  <span style="color: red">*</span></label>
                            @error('message')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                            <input class="waves-effect waves-light btn" value="Send" type="submit"></div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
