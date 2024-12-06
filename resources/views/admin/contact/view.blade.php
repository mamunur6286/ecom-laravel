@extends('admin.master')
@section('title','Message View')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <div class="text-center">
                <h3>Message View</h3>
            </div>
        </div>
        <br>
        <br>
        <div class="">
            <table class="table  table-striped table-bordered">
                <tr>
                    <td>Name</td>
                    <td>{{ $msg->name }}</td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td>{{ $msg->mobile }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $msg->email }}</td>
                </tr><tr>
                    <td>Message</td>
                    <td>{{ $msg->message }}</td>
                </tr>
                {{--<tr>
                    <td>Country</td>
                    <td>{{ $msg->country	 }}</td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>{{ $msg->city }}</td>
                </tr>
                <tr>
                    <td>Zip Code</td>
                    <td>{{ $msg->zip_code }}</td>
                </tr>--}}
                <tr>
                    <td>Address</td>
                    <td>{{ $msg->address }}</td>
                </tr>
            </table>
        </div>

        <br>
        <br>
        <br>
    </div>

    </div>
@endsection