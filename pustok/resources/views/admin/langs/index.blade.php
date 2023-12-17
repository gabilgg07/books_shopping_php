@extends("admin.layouts.master")
@push("page_title")
Langs Index
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
            <h5 class="card-title">Langs
            </h5>
            <div class="header-elements">
                <a href="{{route('manager.langs.create')}}" class="btn btn-success"><i class="icon-plus-circle2 mr-2"></i> Add Language</a>
            </div>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Country</th>
                    <th>Image</th>
                    <th>Is Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($langs as $lang)
                <tr>
                    <td>{{$lang->code}}</td>
                    <td>{{$lang->country}}</td>
                    <td>
                        <div class="image">
                            <img src="{{$lang->image}}" alt="{{$lang->code.'-'.$lang->country}}" style="max-width: 100%;">
                        </div>
                    </td>
                    <td class="text-center">
                        @if ($lang->is_active)
                        <span class="badge badge-success">Yes</span>
                        @else
                        <span class="badge badge-danger">No</span>
                        @endif
                    </td>
                    <td class="text-right">
                        <a href="{{route('manager.langs.edit',$lang->id)}}" class="btn btn-warning"><i class="icon-pencil3 mr-2"></i> Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post" action="{{route('manager.langs.destroy', $lang->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="width: 100px;" class="btn btn-outline-danger ml-1"><i class="icon-trash mr-2"></i> Delete</button>
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