@extends('admin.master')
@section('title','Message List')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Message List</h3>
            <br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped  table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($messages as $message)
                        <tr>
                            <th>{{ $i++ }}</th>
                            @if($message->status==0)
                            <td style="font-weight: bold">{{ $message->name }}</td>
                            @else
                                <td >{{ $message->name }}</td>
                            @endif
                            <td>{{ $message->mobile}}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ substr($message->message,0,10).'....' }}</td>
                            <td>{{ \Carbon\Carbon::parse($message->created_at)->format('M d Y , h:i:s') }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-info" href="{{ route('admin-contact.show',$message->id) }}"><i class="fa fa-arrow-up"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form id="from1" action="{{ route('admin-contact.destroy',$message->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button  class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <br>
            <br>
        </div>

    </div>
@endsection