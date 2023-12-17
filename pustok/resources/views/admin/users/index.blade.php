@extends("admin.layouts.master")
@push("page_title")
Users Index
@endpush
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
                <a href="{{route('manager.users.create')}}" class="btn btn-success"><i
                        class="icon-plus-circle2 mr-2"></i> Add User</a>
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
                        <a href="{{route('manager.users.edit',$user->id)}}" class="btn btn-warning"><i
                                class="icon-pencil3 mr-2"></i> Edit</a>
                        <!-- <a href="{{route('manager.users.destroy',$user->id)}}" class="btn btn-outline-danger"><i
                                class="icon-trash mr-2"></i>Delete</a> -->

                        <form onsubmit="return confirm('Are you sure?')" method="post"
                            action="{{route('manager.users.destroy', $user->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="width: 100px;" class="btn btn-outline-danger ml-1"><i
                                    class="icon-trash mr-2"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic datatable -->

</div>
@endsection