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
                            <span class="theme-secondary-color">Deposit</span> Amount
                            <p class='text-center' style='font-size:14px;color:gray'>({{$setting->bkash_no }})</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    {!! Form::open(['route'=>'account.store','file'=>true]) !!}
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('mobile','',['class'=>'validate']) }}
                            <label for="name">Account Number</label>
                            @error('mobile')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('amount','',['class'=>'validate']) }}
                            <label for="name">Amount</label>
                            @error('amount')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4">
                            {{ Form::text('transaction_id','',['class'=>'validate']) }}
                            <label for="transaction_id">Transaction Ide</label>
                            @error('transaction_id')
                            <span style="color: red" role="alert">
                                        {{ $message }}
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m6 l4 offset-m3 offset-l4 center">
                            <input class="waves-effect waves-light btn" value="Submit" type="submit"></div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
