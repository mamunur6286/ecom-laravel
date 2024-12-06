@extends('fontend.master')
@section('title','Shataj-Ecommerce || Order-list')
@section('body')

    <!-- CONTENT -->
    <div id="page-content">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title"><span class="theme-secondary-color">Order</span> List
                        </div></div></div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box table-responsive">
                            <!-- item-->


                            <table class="table table-bordered text-center" width="100%">
                                <tr style="border-bottom: 1px solid gray">
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>
                                        @foreach($orders as $order)@endforeach
                                        @if(isset($order) && $order->status==0)
                                            {{ 'Status' }}
                                        @else
                                            {{ "Action" }}
                                        @endif
                                    </th>
                                </tr>
                                @foreach($orders as $order)
                                    <tr style="border-bottom: 1px solid gray">
                                        <td><img width="60px" height="60px" class="img-fluid" src="{{ asset('/').$order->image }}"></td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->price }}</td>
                                        <td>
                                            {{ $order->qnty }}
                                        </td>
                                        <td>{{ $order->subtotal }}</td>
                                        <td>
                                        @if($order->status==0)
                                            {{ 'Pending' }}
                                        @else

                                        <form style="margin-top: -20px" id="from1" action="{{ route('checkout.destroy',$order->id) }}" method="post">
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



