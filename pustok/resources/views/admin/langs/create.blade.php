@extends("admin.layouts.master")

@push("theme_js")
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\uniform.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
<script src="{{asset('admin/global_assets\js\demo_pages\form_inputs.js')}}"></script>
<script>
$(window).on('load', function() {
    $("#image_input").change(function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#image").attr(
            "src",
            URL.createObjectURL(event.target.files[0])
        );
        $("#image").removeClass('d-none');
    });
});
</script>
@endpush

@push("page_title")
{{Str::headline($table_name)}} Create
@endpush

@section("content")
<div class="content">
    @include('admin.layouts.includes.alert')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{Str::headline($table_name)}} Create Form</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('manager.'.$table_name.'.store')}}" enctype="multipart/form-data">
                @csrf
                <fieldset class="mb-3">
                    @include('admin.layouts.includes.create_input',['field_name'=>'code'])
                    @include('admin.layouts.includes.create_input',['field_name'=>'country'])
                    @include('admin.layouts.includes.create_check',['field_name'=>'is_active'])
                    @include('admin.layouts.includes.image_input',['model_name'=>'lang'])
                    @include('admin.layouts.includes.image',['field_value'=>'','class_name'=>'lang-flag',
                    'col_count'=>3])
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i>
                        Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection