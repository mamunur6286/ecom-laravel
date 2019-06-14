@extends('admin.master')
@section('title','Setting')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>Setting</h3>
            <br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Header Logo</th>
                        <th>Banner</th>
                        <th>Referal Amount</th>
                        <th>Active Amount</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($settings as $setting)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td><img width="60px" height="60px" src="{{ asset('/').$setting->header_logo }}" alt=""></td>
                            <td><img width="60px" height="60px" src="{{ asset('/').$setting->banner }}" alt=""></td>
                            <td>{{ $setting->referal_amount }}</td>
                            <td>{{ $setting->active_amount }}</td>
                            <td>{{ $setting->address }}</td>
                            <td>{{ $setting->mobile }}</td>
                            <td>{{ $setting->email }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-sm btn-info" href="{{ route('setting.edit',$setting->id) }}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="col-md-6">
                                        <form id="from1" action="{{ route('setting.destroy',$setting->id) }}" method="post">
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