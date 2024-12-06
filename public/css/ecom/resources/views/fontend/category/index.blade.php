@extends('fontend.master')

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
        <!-- PROMO -->
        <div class="section promo">
            <div class="container">
                <div class="col s12"><img src="{{ asset('/') }}fontend/img/promo.jpg" alt="promo"></div>
            </div>
        </div>
@endsection