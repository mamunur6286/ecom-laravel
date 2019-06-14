@extends('admin.master')
@section('title','Category List')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Category List</h3>
            <br>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('admin-categories.create') }}" class="btn btn-info"><i class="fa fa-plus-square"></i> Add Category</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($categories as $category)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $category->category_name }}</td>
                            <td><img width="60px" height="60px" src="{{ asset('/').$category->image }}" alt=""></td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a class="btn btn-sm btn-info" href="{{ route('admin-categories.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
                                    </div>
                                    {{--<div class="col-md-3">
                                        <form id="from1"  action="{{ route('admin-categories.destroy',$category->id) }}" method="post">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button  class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </div>--}}
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