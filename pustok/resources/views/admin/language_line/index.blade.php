@php
$model_name = $index_view_model['model_name'];
$table_name = $index_view_model['table_name'];
$models = $index_view_model['models'];
@endphp

@extends('admin.layouts.master')

@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\tables\datatables\datatables.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\datatables_basic.js')}}"></script>
@endpush

@push("page_title")
{{Str::headline($table_name)}} Index
@endpush

@section('content')
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card mb-2 d-none alert alert-dismissible" id="alert_message">
        <button type="button" class="close close-alert"><span>×</span></button>
        <span class="msg-text"></span>
    </div>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($table_name)}} Index Table</h5>
            <div style="display: flex; gap: 10px;">
                <div class="box-btn">
                    <a href="{{route('manager.'.$table_name.'.create')}}" type="button" class="btn btn-block btn-success">
                        <i class="icon-plus-circle2 mr-2"></i> Add {{Str::headline($model_name)}}</a>
                </div>
                <div class="box-btn">
                    <a href="{{route('manager.'.$table_name.'.deleteds')}}" class="btn btn-danger">
                        <i class="mi-delete-sweep mr-1" style="font-size: 18px;"></i>
                        Deleted {{Str::headline($table_name)}} Table</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered datatable-basic">
            <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Group</th>
                    <th>Key</th>
                    <th>Text</th>
                    <th>Is Active</th>
                    <th class="w-auto">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($models as $model)
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->group}}</td>
                    <td>{{$model->key}}</td>
                    <td>{{Str::limit(json_encode($model->text),100)}}</td>
                    <td class="text-center">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery isActive" id="{{$model->id}}" data-fouc="" {{$model->is_active?'checked':''}}>
                        </label>
                    </td>
                    <td class="text-right">
                        <a href="{{route('manager.'.$table_name.'.show', $model->id)}}" class="btn btn-info"><i class="mi-info mr-2"></i> Info</a>
                        <a href="{{route('manager.'.$table_name.'.edit',$model->id)}}" class="btn btn-warning"><i class="icon-pencil3 mr-2"></i>
                            Edit</a>
                        <form onsubmit="return confirm('Are you sure?')" method="post" action="{{route('manager.'.$table_name.'.destroy', $model->id)}}" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button type="submit" style="width: fit-content;" class="btn btn-outline-danger"><i class="mi-delete mr-2"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('custom_js')
<script>
    $(document).ready(function() {
        const alertElement = $('#alert_message');
        $('.close-alert').click(function() {
            alertElement.addClass('d-none');
        });
        let typeMsg = 'alert-';
        let msg = '';
        $('.isActive').click(function() {
            const id = $(this).attr('id');
            const is_active = $(this).is(':checked');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('manager.'.$table_name.'.change_active') }}",
                type: 'PATCH',
                data: {
                    id: id,
                    is_active: is_active,
                },
                success: function(result) {
                    const data = JSON.parse(result);
                    const {
                        type,
                        message
                    } = data;

                    typeMsg += type;
                    msg = message;
                },
                error: function(result) {
                    const data = JSON.parse(result);
                    const {
                        type,
                        message
                    } = data;
                    typeMsg += type;
                    msg = message;
                },
                complete: function(result) {
                    alertElement.removeClass('d-none');
                    alertElement.addClass(typeMsg);
                    alertElement.children('.msg-text').text(msg);
                }
            });

        });
    });
</script>
@endpush