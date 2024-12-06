@extends('admin.master')
@section('title','Order Details')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <div class="text-center">
                <h3>Order Details</h3>
            </div>
        </div>
            <br>
            <br>
            <div class="">
                <table class="table  table-striped table-bordered">
                    <tr>
                        <td>Customer Name</td>
                        <td>{{ $details->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $details->name }}</td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>{{ $details->mobile }}</td>
                    </tr>
                    {{--<tr>
                        <td>Country</td>
                        <td>{{ $details->country	 }}</td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>{{ $details->city }}</td>
                    </tr>
                    <tr>
                        <td>Zip Code</td>
                        <td>{{ $details->zip_code }}</td>
                    </tr>--}}
                    <tr>
                        <td>Address</td>
                        <td>{{ $details->address }}</td>
                    </tr>
                </table>
            </div>

            <br>
            <br>
            <br>
        </div>

    </div>
@endsection