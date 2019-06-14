@extends('fontend.master')
@section('title','Shataj-Ecommerce || message-list')
@section('body')

    <!-- CONTENT -->
    <div id="page-content">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title"><span class="theme-secondary-color">Message</span> List
                        </div></div></div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box table-responsive">
                            <!-- item-->


                            <table class="table table-bordered text-center" width="100%">
                                <tr style="border-bottom: 1px solid gray">
                                    <th>SL</th>
                                    <th>Message</th>
                                    <th>Date</th></th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                @php($i=1)
                                @foreach($messages as $message)
                                    <tr style="border-bottom: 1px solid gray">
                                       <td>{{ $i++ }}</td>
                                        @if($message->status==0)
                                            <td style="font-weight: bold">{{  substr($message->message,0,20).' ....' }}</td>
                                        @else
                                            <td >{{ substr($message->message,0,20).' ....' }}</td>
                                        @endif 
                                         <td>{{ \Carbon\Carbon::parse($message->created_at)->format('M d Y , h:i:s') }}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col s6">
                                                    <a class="btn btn-success" href="{{ url('show/message',$message->id) }}"><i class="fas fa-eye"></i></a>
                                                </div>
                                                <div class="col s6">
                                                    <form style="margin-top: -20px" id="from1" action="{{ route('checkout.destroy',$message->id) }}" method="post">
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button  class="btn btn-danger" type="submit">X</button>
                                                    </form>
                                                </div>
                                            </div>

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



