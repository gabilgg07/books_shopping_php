@extends("admin.layouts.master")

@section("content")
<div class="content">

    <!-- Basic datatable -->
    <div class="card">

        @if (session('message'))
        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            {{session('message')}}
        </div>
        @endif
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Users
            </h5>
            <div class="header-elements">
                <a href="{{route('manager.users.create')}}" class="btn btn-success">Add User</a>
            </div>
        </div>

        <table class="table datatable-basic">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-mail</th>
                    <th>Created At</th>
                    <th>Is Admin</th>
                    <th>Is Deleted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                <tr>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        @if ($user->is_admin)
                        <span class="badge badge-success">Admin</span>
                        @else
                        <span class="badge badge-info">User</span>
                        @endif
                    </td>
                    <td>
                        @if (!$user->is_deleted)
                        <span class="badge badge-success">No</span>
                        @else
                        <span class="badge badge-danger">Yes</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('manager.users.edit',$user->id)}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('manager.users.destroy',$user->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

</div>
@endsection