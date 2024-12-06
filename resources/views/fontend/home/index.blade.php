@extends('fontend.master')
@section('slider')
    <!-- MAIN SLIDER -->
    <div class="main-slider" data-indicators="true">
        <div class="carousel carousel-slider " data-indicators="true">
            @foreach($sliders as $slider)
            <a class="carousel-item"><img src="{{ asset('/') }}{{ $slider->image }}" alt="slider"></a>
            <a class="carousel-item"><img src="{{ asset('/') }}{{ $slider->image }}" alt="slider"></a>
            @endforeach
        </div>
    </div>

@endsection
@section('body')
    <!-- CATEGORY -->
    <div class="section home-category">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="section-title"><span class="theme-secondary-color">PRODUCTS</span> CATAGORIES </div>
                </div></div>
            <div class="row icon-service">
                @foreach($categories as $category)
                <div class="col s4 m4 l2">
                    <div class="content">
                        <div class="in-content">
                            <div class="in-in-content"><a href="{{ url('products',$category->slug) }}"><img src="{{ asset('/').$category->image }}" alt="category"></a><a
                                        href="{{ url('products',$category->slug) }}"><h5>{{ $category->category_name }}<br></h5></a></div>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </div>

    <!-- END CATEGORY -->

    <!-- FEATURED PRODUCT -->
    <div class="section product-item si-featured">
        <div class="container">
            <div class="row row-title">
                <div class="col s12">
                    <div class="section-title"><span class="theme-secondary-color">FEATURED</span> PRODUCTS
                    </div></div></div>
            <div class="row slick-product">
                <div class="col s12">
                    <div id="featured-product" class="featured-product">

                        <!-- Product item 1 -->
                    @foreach($products as $product)
                        <div>
                            <div class="col-slick-product">
                                <div class="box-product">
                                    <div class="bp-top">
                                        <div class="product-list-img">
                                            <div class="pli-one">
                                                <div class="pli-two"><a href="{{ route('fontend-products.show',$product->id) }}"><img src="{{ asset('/').$product->image }}" alt="img"></a>
                                                </div></div></div>
                                        <h5><a href="{{ route('fontend-products.show',$product->id) }}">{{ $product->product_name }}</a></h5>
                                        <div  class="price">৳ {{ $product->retail_price }} <span>/{{ $product->unit }} Retail </span></div>
                                        @if($product->wholesale_price !=0)

                                        <div style="margin-bottom: 12px" class="price">৳ {{ $product->wholesale_price }} <span>/{{ $product->unit }} Wholesale </span></div>
                                        @else
                                            <br>
                                            <br>
                                        @endif
                                    </div>
                                    <div class="bp-bottom"><a href="{{ route('fontend-products.show',$product->id) }}" class="btn button-add-cart">BUY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                        <!-- Product item 2 -->
                    </div>
                </div>
            </div>
        </div>


        <!-- PROMO -->
        <div class="section promo">
            <div class="container">
                <div class="col s12"><img src="{{ asset('/') }}fontend/img/promo.jpg" alt="promo"></div>
            </div>
        </div>
@endsection