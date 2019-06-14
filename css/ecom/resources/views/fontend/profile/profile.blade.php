@extends('fontend.master')
@section('title','Shataj-Ecommerce || Register')
@section('body')
    <!-- CONTENT -->
    <div id="page-content">
        <div class="login-form">
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title">
                            <span class="theme-secondary-color">Your</span> Profile @if(auth()->user()->verify ==1 )({{ $user->own_referal_id }})@else {{"(Inactive)"}}@endif
                        </div>
                    </div>
                </div>
                <div style="text-align: center" class="text-center">
                    @if($profile->image)

                    <img style="border:1px solid gray;border-radius: 100px" src="{{ asset('/').$user->image }}" width="150px" height="150px">
               @endif
                </div>
                {{ Form::open(['method'=>'put','route'=>['profile.update',$user->id],'files'=>true]) }}
                <div class="row">
                    <div class="col m6 s12 l6">
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::file('image',['class'=>'validate']) }}
                                @error('image')
                                <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('name',$user->name,['class'=>'validate']) }}
                                <label for="name">User Name</label>
                                @error('name')
                                <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('mobile',$user->mobile,['class'=>'validate']) }}
                                <label for="mobile">User Mobile</label>
                                @error('mobile')
                                <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('email',$user->email,['class'=>'validate']) }}
                                <label for="mobile">User Email</label>
                                @error('email')
                                <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('bkash_no',$user->bkash_no,['class'=>'validate',]) }}
                                <label for="address">Bkash No</label>
                                @error('bkash_no')
                                <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="col m6 s12 l6">
                        <div class="row">
                            @if(auth()->user()->verify ==1 )
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('',$user->own_referal_id,['class'=>'validate','readonly']) }}
                                <label for="mobile">Own Referel Id</label>
                            </div>
                                @endif
                        </div>
                        @if($user->uses_referal_id)
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('',$user->uses_referal_id,['class'=>'validate','readonly']) }}
                                <label for="uses_referal_id">Uses Referel Id</label>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="input-field col s12 m12 l8 offset-m3 offset-l4">
                                {{ Form::text('address',$user->address,['class'=>'validate']) }}
                                <label for="address">Address</label>
                                @error('address')
                                <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                                <input class="waves-effect waves-light btn" value="Update" type="submit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
