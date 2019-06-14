@extends('admin.master')
@section('title','Product List')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Product List</h3>
            <br>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin-products.create') }}" class="btn btn-info"><i class="fa fa-plus-square"></i> Add Product</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped  table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Retail Price</th>
                        <th>Wholesale Price</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($products as $product)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $product->product_name }}</td>
                            <td><img height="60px" width="60px" src="{{ asset('/'). $product->image }}" alt="product"></td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->retail_price }}</td>
                            <td>{{ $product->wholesale_price }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->created_at)->format('M d Y , h:i:s') }}</td>

                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-info" href="{{ route('admin-products.edit',$product->id) }}"><i class="fa fa-edit"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form id="from1" action="{{ route('admin-products.destroy',$product->id) }}" method="post">
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