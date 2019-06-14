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
                            <span class="theme-secondary-color">Register</span> Account
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! Form::open(['route'=>'register','file'=>true]) !!}
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('name','',['class'=>'validate']) }}
                            <label for="name">User Name <span style="color: red">*</span></label>
                            @error('name')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('mobile','',['class'=>'validate']) }}
                            <label for="mobile">User Mobile  <span style="color: red">*</span></label>
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
                            <label for="email">User Email</label>
                            @error('email')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('referal_id','',['class'=>'validate']) }}
                            <label for="referal_id">Referal Id</label>
                            @error('referal_id')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::password('password',['class'=>'validate']) }}
                            <label for="password">Password  <span style="color: red">*</span></label>
                            @error('password')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::password('confirm_password',['class'=>'validate']) }}
                            <label for="confirm_password">Confirm Password <span style="color: red">*</span></label>
                            @error('confirm_password')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                            <input class="waves-effect waves-light btn" value="SAVE" type="submit"></div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="row fp-text">
                    <div class="col s12">
                        <div class="forgot-password-link">
                            <a href="#">Forgot Password</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="or-line">
                            <div class="ol-or">OR</div>
                            <div class="ol-line"></div>
                        </div>
                    </div>
                </div>
                {{--<div class="row">
                    <div class="col s12">
                        <div class="sign-in-sosmed">
                            <div class="sign-in-icon sii-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                            <div class="sign-in-icon sii-twitter">
                                <i class="fab fa-twitter"></i>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <div class="row">
                    <div class="col s12 center">
                        You have an Account ? <a href="{{ route('show-login') }}">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
