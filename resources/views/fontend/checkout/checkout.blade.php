@extends('fontend.master')
@section('title','Shataj-Ecommerce || Checkout')
@section('body')
    <!-- CONTENT -->
    <!-- CONTENT -->
    <div id="page-content" class="shipping-checkout-page">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title">Checkout</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box table-responsive">
                            <!-- item-->
                            <table class="table table-bordered text-center" width="100%">
                                <tr style="border-bottom: 1px solid gray">
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Qnty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                                @foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $cart)
                                    <tr style="border-bottom: 1px solid gray">
                                        <td><img width="60px" height="60px" class="img-fluid" src="{{ asset('/').$cart->options->image }}"><span style="margin-top: -20px">{{ $cart->name }}</span> </td>
                                        <td>{{ $cart->price }}</td>
                                        <td>
                                            {{ Form::open(['method'=>'put','route' => ['carts.update',$cart->rowId],'files'=>true]) }}

                                            <input type="number" name="qnty" value="{{ $cart->qty }}" class="form-control" style="width: 50px">
                                            <input type="submit" value="update" class=" btn btn-success" style="width: 66px;font-size: 11px;height: 32px;padding: 0px;">

                                            {{ Form::close() }}
                                        </td>
                                        <td>{{ $cart->subtotal }}</td>
                                        <td>
                                            <form style="margin-top: -20px" id="from1" action="{{ route('carts.destroy',$cart->rowId) }}" method="post">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  class="btn btn-danger" type="submit">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>

                        </div>

                        <div class="checkout-payable">
                            <div class="cart-cp cart-total">
                                <div class="cp-left">Total</div>
                                <div class="cp-right">{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</div>
                            </div>
                            <div class="cart-cp cart-discount">
                                <div class="cp-left">Discount</div>
                                <div class="cp-right">{{ \Gloudemans\Shoppingcart\Facades\Cart::discount() }}</div>
                            </div>
                            {{-- <div class="cart-cp cart-delivery">
                                 <div class="cp-left">Delivery</div>
                                 <div class="cp-right">$ 2.00</div>
                             </div>--}}
                            <div class="cart-cp cart-total-payable">
                                <div class="cp-left">Total payable</div>
                                <div class="cp-right">{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <form method="post" action="{{ route('checkout.store') }}" class="col s12">
                        {{ csrf_field() }}
                        <div class="shipping-info-wrap ck-box">
                            <div class="row">
                                <div class="input-field col s12 m12 l12 ">
                                    <div class="payment-method-text">
                                        <i class="fab fa-wpforms"></i> Shipping Information
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div style="margin: 0px 0px 10px">New shipping address :</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12 ">
                                    <input name="name" type="text" class="validate">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12 m12 l12 ">
                                    <input name="mobile" type="tel" class="validate">
                                    <label for="phone">Phone</label>
                                </div>
                            </div>
                            {{--<div class="row">
                                <div class="input-field col s12 m12 l12 ">
                                    <input name="country" type="text" class="validate">
                                    <label for="state">State/Country</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6 m12 l6 ">
                                    <input name="city" type="text" class="validate">
                                    <label for="town">Town/City</label>
                                </div>
                                <div class="input-field col s6 m12 l6 ">
                                    <input name="zip_code" type="text" class="validate">
                                    <label for="zip">Portalcode/ZIP</label>
                                </div>
                            </div>--}}
                            <div class="row">
                                <div class="input-field col s12 m12 l12 ">
                                    <textarea name="address" class="materialize-textarea"></textarea>
                                    <label for="address">Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m12 l12 center">
                                <button class="btn theme-btn-rounded ">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
