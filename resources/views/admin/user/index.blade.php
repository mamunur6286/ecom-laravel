@extends('admin.master')
@section('title','User List')
@section('body')
    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
        <br>
        <br>
        <div class="col-md-12">
            <h3>User List</h3>
            <br>
            <div class="table-responsive">
                <table id="dataTable" class="table table-striped  table-bordered">
                    <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>User Name</th>
                        <th>Image</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Wallet</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($users as $user)
                        <tr>
                            <th>{{ $i++ }}</th>
                            <td>{{ $user->name }}</td>
                            <td><img src="{{ asset('/').$user->image }}"  width="60px" height="60px" alt="img"></td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->wallet }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a class="btn btn-info" href="{{ route('user-contact.show',$user->id) }}">MES.</a>
                                    </div>
                                    <div class="col-md-6">
                                        <form onclick="return confirm('Are You sure to delele?')" id="from1"  action="{{ route('admin-user.destroy',$user->id) }}" method="post">
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