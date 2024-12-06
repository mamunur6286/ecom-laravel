@extends('fontend.master')
@section('title','Shataj-Ecommerce || message-show')
@section('body')

    <!-- CONTENT -->
    <div id="page-content">
        <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="section-title"><span class="theme-secondary-color">Message</span> Details
                        </div></div></div>
                <div class="row">
                    <div class="col s12">
                        <div class="cart-box table-responsive">
                            <!-- item-->


                            <table class="table table-bordered text-center" width="100%">
                                <tr style="border-bottom: 1px solid gray">
                                    <td>{{ $message }}</td>
                                </tr>
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



