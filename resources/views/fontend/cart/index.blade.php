@extends('fontend.master')
@section('title','Shataj-Ecommerce || Cart-list')
@section('body')

    <!-- CONTENT -->
    <div id="page-content">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title"><span class="theme-secondary-color">Shopping</span> Cart
                        </div></div></div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box table-responsive">
                            <!-- item-->
                            <table class="table table-bordered text-center" width="100%">
                                <tr style="border-bottom: 1px solid gray">
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Qnty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($carts as $cart)
                                    <tr style="border-bottom: 1px solid gray">
                                        <td>{{ $cart->name }}</td>
                                        <td><img width="60px" height="60px" class="img-fluid" src="{{ asset('/').$cart->options->image }}"></td>
                                        <td>{{ $cart->price }}</td>
                                        <td>
                                            {{ Form::open(['method'=>'put','route' => ['carts.update',$cart->rowId],'files'=>true]) }}

                                            <input type="number" name="qnty" value="{{ $cart->qty }}" class="form-control" style="width: 50px">
                                            <input type="submit" value="update" class=" btn btn-success" style="width: 66px;font-size: 11px;height: 32px;padding: 0px;margin-top: -10px">

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
                        <a href="{{ url('/') }}" class="btn btn-danger">Continue Sopping <i class="fas fa-arrow-circle-right"></i></a>
                        @if(Cart::count())
                            <a href="{{ route('checkout.create') }}" class="btn button-add-cart checkout-button">Checkout <i class="fas fa-arrow-circle-right"></i></a>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        document.querySelector('#from1').addEventListener('submit', function(e) {
            var form = this;

            e.preventDefault();

            swal({
                title: "Are you sure?",
                text: "To Delete this field!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    form.submit();

                }
            });




            /*swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: [
                    'No, cancel it!',
                    'Yes, I am sure!'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'Shortlisted!',
                        text: 'Candidates are successfully shortlisted!',
                        icon: 'success'
                    }).then(function() {
                        form.submit();
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            });*/
        });

    </script>

    <style>
        .swal-button--confirm {
            background-color: #DD6B55;
        }
    </style>

@endsection
