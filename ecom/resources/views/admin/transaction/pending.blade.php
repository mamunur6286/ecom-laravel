@extends('admin.master')
@section('title','Pending Transaction')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Pending Transaction</h3>
            <br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>User Name</th>
                        <th>Mobile</th>
                        <th>Amount</th>
                        <th>Transaction Id</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($transactions as $transaction)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $transaction->user->name }}</td>
                            <td>{{ $transaction->mobile }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>{{ $transaction->transaction_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('M d Y , h:i:s') }}</td>

                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-info" href="{{ route('admin-transaction.edit',$transaction->id) }}"><i class="fa fa-arrow-up"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form id="from1" action="{{ route('admin-transaction.destroy',$transaction->id) }}" method="post">
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