@extends('admin.master')
@section('title','Success Transaction')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Success Withdraw</h3>
            <br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>User Name</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($withdraws as $withdraw)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $withdraw->user->name }}</td>
                            <td>{{ $withdraw->mobile }}</td>
                            <td>{{ $withdraw->amount }}</td>
                            <td>{{ \Carbon\Carbon::parse($withdraw->created_at)->format('M d Y , h:i:s') }}</td>

                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <form id="from1" action="{{ route('admin-withdraw.destroy',$withdraw->id) }}" method="post">
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