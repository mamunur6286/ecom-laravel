@extends('fontend.master')
@section('body')
    <style>
        .pg-product-price2{
            font-size: 16px;
            font-weight: 600;
            color: #ff8700;
            float: left;
            text-align: right;
            padding-right: 5px;
            right: 0px;
            top: 0px;
            margin-top: 3px;

        }
        .price-type{
            font-size: 13px;
            font-weight: 600;
            color: #d71149;
            padding-right: 20px;
            margin-top: 0px;
        }
    </style>
<!-- CONTENT -->
<div id="page-content" class="product-page">
    <div id="product-image" class="pg-product-image">
        <!-- image -->
        <div>
            <div class="pgp-wrap-img">
                <div class="pgp-wrap-img-in">
                    <div class="pgp-img" style="background-image: url({{ asset('/').$product->image }});">
                    </div>
                </div>
            </div>
        </div>
        <!-- end image -->
        <!-- image -->
        <div>
            <div class="pgp-wrap-img">
                <div class="pgp-wrap-img-in">
                    <div class="pgp-img" style="background-image: url({{ asset('/').$product->image }});">
                    </div>
                </div>
            </div>
        </div>
        <!-- end image -->
        <!-- image -->
        <div>
            <div class="pgp-wrap-img">
                <div class="pgp-wrap-img-in">
                    <div class="pgp-img" style="background-image: url({{ asset('/').$product->image }});">
                    </div>
                </div>
            </div>
        </div>
        <!-- end image --></div>
    <div class="add-wish-lish">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="awl-btn">
                        <div class="awl-btn-icon">
                            <i class="far fa-heart"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="name-price">
                    <div class="pg-product-name">{{ $product->product_name }}</div>

                        <br>
                            <div class="pg-product-price2">৳ {{ $product->retail_price }}/{{ $product->unit }} <span class="price-type"> (Retail Price)</span></div>
                    <br>
                    <br>
                    @if($product->wholesale_price !=0)

                    <div class="pg-product-price2">৳ {{ $product->wholesale_price }}/{{ $product->unit }}<span class="price-type"> (Wholesale Price)</span></div><br><br>
                            <div class="price-type">Minimum qty ({{ $product->wholesale_qnty }})</div>
                    @endif
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="desciption-product">
        <div class="container">
            <div class="row">
                <div class="col s12">

                    {{ $product->description }}
                </div>
            </div>
        </div>
    </div>
    <div class="qty-total-price">
        <div class="container">
            <div class="row">
                <div class="col s2">
                    <div class="qty-qty">Retail Qty</div>
                </div>
                {{ Form::open(['route'=>'carts.store']) }}
                
                <input name="id" type="hidden"  value="{{ $product->id }}">
                <div class="col s6">
                    <div class="qty-prc">
                        <div class="quantity">
                            <input name="qnty" type="number" min="1" max="9999" step="1" value="1">
                            
                        </div>
                    </div>
                </div>
                <div class="col s4">
                    <div class="qty-buy">
                        <button class="btn button-add-cart">Add to Cart</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <!----- quantity for wholesale------
    -->

    @if($product->wholesale_price !=0)
    <div class="qty-total-price">
        <div class="container">
            <div class="row">
                <div class="col s2">
                    <div class="qty-qty"> Whole sale Qty</div>
                </div>
                {{ Form::open(['url'=>'carts/store2']) }}
<input name="id" type="hidden"  value="{{ $product->id }}">
                <div class="col s6">
                    <div class="qty-prc">
                        <div class="quantity">
                        <input name="qnty" type="number" min="1" max="9999" step="1" value="{{ $product->wholesale_qnty }}">
                        
                        </div>
                    </div>
                </div>
                <div class="col s4">
                    <div class="qty-buy">
                        <button class="btn button-add-cart">Add to Cart</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
        @endif
</div>
@endsection
