@php
$isEditor = $isEditor ?? false;
@endphp

<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid border-0">
            @foreach($langs as $key=>$lang)
            <li class="nav-item border {{$errors->has($field_name.'.' . $lang->code)?'border-danger':''}}"><a
                    href="#{{$lang->code}}" class="nav-link {{$key === 0 ? 'active' : ''}}"
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
                                <label>{{Str::headline($field_name)}}:</label>

                                <textarea class="{{$isEditor?'summernote':'form-control'}}"
                                    name="{{$field_name}}[{{$lang->code}}]">{{ old($field_name.'.' . $lang->code, array_key_exists($lang->code, $field_value)?$field_value[$lang->code]:'') }}</textarea>

                                @error($field_name.'.' . $lang->code)
                                <span class="text-danger ml-2">{{$message}}</span>
                                @enderror
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>