@extends('admin.master')
@section('title','Pending Order')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Pending Order</h3>
            <br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>User Name</th>
                        <th>Bill Address</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Qnty</th>
                        <th>Subtotal</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($orders as $Order)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $Order->user->name }}</td>
                            <td><a href="{{ route('admin-order.show',$Order->order_details_id) }}">{{ $Order->biiAddress->name }}</a></td>
                            <td>{{ $Order->product_name }}</td>
                            <td><img src="{{ asset('/').$Order->image }}"  width="60px" height="60px" alt="img"></td>
                            <td>{{ $Order->price }}</td>
                            <td>{{ $Order->qnty }}</td>
                            <td>{{ $Order->subtotal }}</td>
                            <td>{{ \Carbon\Carbon::parse($Order->created_at)->format('M d Y , h:i:s') }}</td>

                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info btn-sm" href="{{ url('order/success',$Order->id) }}"><i class="fa fa-arrow-up"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form id="from1" action="{{ route('admin-order.destroy',$Order->id) }}" method="post">
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