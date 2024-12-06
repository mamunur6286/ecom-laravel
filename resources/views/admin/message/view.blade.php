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
                    <td>Receiver Name</td>
                    <td>{{ $msg->user->name }}</td>
                </tr>
               <tr>
                    <td>Message Date</td>
                    <td>{{ \Carbon\Carbon::parse($msg->created_at)->format('M d Y , h:i:s') }}</td>
                </tr>
                 <tr>
                    <td>Message</td>
                    <td>{{ $msg->message }}</td>
                </tr>
            </table>
        </div>

        <br>
        <br>
        <br>
    </div>

    </div>
@endsection