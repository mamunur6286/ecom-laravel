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
                                    <th>Mobile</th>
                                    <th>TK</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                @php($i=1)
                                @foreach($transfers as $transfer)
                                    <tr style="border-bottom: 1px solid gray">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $transfer->mobile }}</td>
                                        <td>{{ $transfer->amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transfer->created_at)->format('M d Y , h:i:s') }}</td>

                                        <td>

                                                <form style="margin-top: -20px" id="from1" action="{{ route('fontend-transfer.destroy',$transfer->id) }}" method="post">
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



        });

    </script>

    <style>
        .swal-button--confirm {
            background-color: #DD6B55;
        }
    </style>

@endsection
