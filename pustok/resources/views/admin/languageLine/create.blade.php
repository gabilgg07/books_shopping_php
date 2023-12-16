@extends('admin.layouts.master')
@section('title', 'Language Line Create')
@push('theme_js')
<script src="{{asset('admin/global_assets\js\plugins\forms\styling\switchery.min.js')}}"></script>
@endpush
@push('page_js')
<script src="{{asset('admin/global_assets\js\demo_pages\form_checkboxes_radios.js')}}"></script>
@endpush
@section('content')

<div class="content">
    <form action="{{route('manager.language_line.store')}}" method="POST" class="row">
        @csrf
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-solid border-0">
                        @foreach($langs as $key=>$lang)
                        <li class="nav-item"><a href="#{{$lang->code}}" class="nav-link {{$key === 0 ? 'active' : ''}}"
                                data-toggle="tab">{{$lang->code}}</a></li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($langs as $key=>$lang)
                        <div class="tab-pane fade {{$key === 0 ? 'show active' : ''}}" id="{{$lang->code}}">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Text:</label>
                                            <input type="text" class="form-control" name="text[{{$lang->code}}]"
                                                value="{{ old('text.' . $lang->code) }}">
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>Group:</label>
                        <input type="text" name="group" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Key:</label>
                        <input type="text" name="key" class="form-control">
                    </div>
                    <div class="form-check form-check-switchery form-check-inline form-check-right">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input-switchery-danger" name="is_deleted"
                                data-fouc="">
                            Is Deleted?
                        </label>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary"><i class="icon-database-insert mr-2"></i> Insert</button>
            </div>
        </div>

    </form>
</div>


@endsection