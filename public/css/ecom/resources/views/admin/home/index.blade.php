@extends('admin.master')
@section('body')
    <div class="col_3">
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-users icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ \App\User::count() }}</strong></h5>
                    <a href="{{ route('admin-user.index') }}"><span>Total User</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-product-hunt user1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ \App\Product::count() }}</strong></h5>
                    <a href="{{ route('admin-products.index') }}"><span>Total Products</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-first-order user2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ \App\Order::count() }}</strong></h5>
                    <a href="{{ route('admin-order.index') }}"><span>Total Order</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-user dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ \App\Contact::count() }}</strong></h5>
                    <a href="{{ route('admin-contact.index') }}"><span>Message</span></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget">
            <div class="r3_counter_box">
                <i class="pull-left fa fa-money dollar2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>{{ \App\Account::count() }}</strong></h5>
                    <a href="{{ route('admin-transaction.index') }}"><span>Transactions</span></a>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
@endsection