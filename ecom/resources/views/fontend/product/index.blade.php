@extends('fontend.master')
@section('slider')
    <!-- MAIN SLIDER -->
    <div class="main-slider" data-indicators="true">
        <div class="carousel carousel-slider " data-indicators="true">
            <a class="carousel-item"><img src="{{ asset('/') }}fontend/img/slide2.jpg" alt="slider"></a>
            <a class="carousel-item"><img src="{{ asset('/') }}fontend/img/slide3.jpg" alt="slider"></a>
        </div>
    </div>

@endsection
@section('body')
    <!-- CONTENT -->
    <div id="">
        <div class="section product-item">
            <div class="container">
                <div class="row row-title">
                    <div class="col s12">
                        <div class="section-title"><span class="theme-secondary-color">OUR</span> PRODUCTS </div>
                    </div></div>

                <div class="row row-no-margin">


                    @foreach($products as $product)

                    <div>
                        <div class="col s6 m4 l3 col-produc">
                            <div class="box-product">
                                <div class="bp-top">
                                    <div class="product-list-img">
                                        <div class="pli-one">
                                            <div class="pli-two"><a href="{{ route('fontend-products.show',$product->id) }}"><img src="{{ asset('/').$product->image }}" alt="img"></a></div>
                                        </div></div>
                                    <h5><a href="{{ route('fontend-products.show',$product->id) }}">{{ $product->product_name }}</a></h5>
                                    <div class="price">৳ {{ $product->retail_price }} <span>/{{ $product->unit }} Retail </span></div>

                                    @if($product->wholesale_price !=0)

                                    <div class="price">৳ {{ $product->wholesale_price }} <span>/{{ $product->unit }} Wholesale </span></div>
                                    @else
                                        <br>
                                    @endif
                                </div>
                                <div class="bp-bottom">
                                    <a href="{{ route('fontend-products.show',$product->id) }}" class="btn button-add-cart">BUY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <!-- Product item 6 -->
                <div>
            </div>
        </div>

        <!-- PAGINATION -->
        <div class="container">
            <div class="row">
                <div class="col s12">
                        {{ $products->links() }}

                </div>
            </div>
        </div>
    </div>
            <!-- PROMO -->
            <div class="section promo">
                <div class="container">
                    <div class="col s12"><img src="{{ asset('/').$setting->banner }}" alt="promo"></div>
                </div>
            </div>

@endsection