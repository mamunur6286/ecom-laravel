@extends('fontend.master')
@section('title','Shataj-Ecommerce || Transaction-History')
@section('body')

    <!-- CONTENT -->
    <div id="page-content">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title"><span class="theme-secondary-color">Transaction</span> History
                        </div></div></div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box table-responsive">
                            <!-- item-->
                            <table class="table table-bordered text-center" width="100%">
                                <tr style="border-bottom: 1px solid gray">
                                    <th>SL</th>
                                    <th>Tk</th>
                                    <th>Tran Id</th>
                                    <th>Date</th>
                                    <th>
                                        @foreach($accounts as $account)@endforeach
                                        @if(isset($account) && $account->status==0)
                                            {{ 'Status' }}
                                        @else
                                            {{ "Action" }}
                                        @endif
                                    </th>                                     </tr>
                                @php($i=1)
                                @foreach($accounts as $account)
                                    <tr style="border-bottom: 1px solid gray">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $account->amount }}</td>
                                        <td>{{ $account->transaction_id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($account->created_at)->format('M d Y , h:i:s') }}</td>
                                        <td>
                                            @if($account->status==0)
                                                {{ 'Pending' }}
                                            @else
                                            <form style="margin-top: -20px" id="from1" action="{{ route('account.destroy',$account->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <button  class="btn btn-danger" type="submit">X</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </table>

                        </div>
                    {{-- <div class="cart-item
                            <div class="ci-img">
                                <div class="ci-img-product" style="background-image: url({{ asset('/').$cart->options->image }});">
                                </div>
                            </div>
                            <div class="ci-name">
                                <div class="cin-top">
                                    <div class="cin-title">{{ $cart->name }}</div>
                                    <div class="cin-price">{{ $cart->price }}</div>
                                </div>
                            </div>
                            <div class="ci-price">
                                <div class="qty-total-price">
                                    <div class="qty-prc">
                                        <div class="quantity">
                                            <input type="number" min="0" max="9999" step="1" value="{{ $cart->qty }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both"></div>
                        </div>--}}
                    <!-- end item-->
                        <div class="checkout-payable">

                            {{-- <div class="cart-cp cart-delivery">
                                 <div class="cp-left">Delivery</div>
                                 <div class="cp-right">$ 2.00</div>
                             </div>--}}

                        </div>
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
