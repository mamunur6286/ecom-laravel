@extends('fontend.master')
@section('title','Shataj-Ecommerce || Login')
@section('body')
    <!-- CONTENT -->
    <div id="page-content">
        <div class="login-form">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color">Log in</span> Account
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! Form::open(['route'=>'check-login']) !!}
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('mobile','',['class'=>'validate']) }}
                            <label for="useremail">User Mobile</label>
                            @error('mobile')
                            <span class="invalid-feedback " style="color: red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::password('password',['class'=>'validate','id'=>'myInput']) }}

                            <div style='text-align:right'>
                                <i style="    margin-top: -40px;
    position: absolute;
    margin-left: -20px;" class="fa fa-eye"  onclick="myFunction()"></i>
                            </div>

                            <label for="password">Password</label>
                            @error('password')
                            <span class="invalid-feedback "  style="color: red"  role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                            <input class="waves-effect waves-light btn" value="LOG IN" type="submit"></div>
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
                        Don't have an Account ? <a href="{{ route('show-register') }}">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection
