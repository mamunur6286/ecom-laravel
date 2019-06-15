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
                                        @foreach($withdraws as $withdraw)@endforeach
                                        @if(isset($withdraw) && $withdraw->status==0)
                                            {{ 'Status' }}
                                        @else
                                            {{ "Action" }}
                                        @endif
                                    </th>                                     </tr>
                                @php($i=1)
                                @foreach($withdraws as $withdraw)
                                    <tr style="border-bottom: 1px solid gray">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $withdraw->amount }}</td>
                                        <td>{{ $withdraw->transaction_id }}</td>
                                        <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('M d Y , h:i:s') }}</td>
                                        <td>
                                            @if($withdraw->status==0)
                                                {{ 'Pending' }}
                                            @else
                                                <form style="margin-top: -20px" id="from1" action="{{ route('account.destroy',$withdraw->id) }}" method="post">
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
