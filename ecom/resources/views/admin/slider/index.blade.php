@extends('admin.master')
@section('title','Slider List')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Sliders List</h3>
            <br>
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('sliders.create') }}" class="btn btn-info"><i class="fa fa-plus-square"></i> Add Slider</a>
                </div>
            </div>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-responsive table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Slider Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($sliders as $slider)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $slider->name }}</td>
                            <td><img width="60px" height="60px" src="{{ asset('/').$slider->image }}" alt=""></td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <form id="from1"  action="{{ route('sliders.destroy',$slider->id) }}" method="post">
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