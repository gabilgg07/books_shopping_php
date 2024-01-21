@php
$default_value=$default_value ?? '';
@endphp
<div class="form-group">
    <label for="{{$field_name}}">Select {{Str::headline($field_label)}}:</label>
    <select class="custom-select form-control-border" id="{{$field_name}}" name="{{$field_name}}"
        value="{{old($field_name, $field_value)}}">
        <option value="{{$default_value}}">{{Str::headline($field_label)}}</option>
        @foreach ($select_items as $item)
        <option @selected((int)old($field_name, $field_value)===$item->id)
            value="{{$item->id}}"
            >{{$item->$shown_field}}</option>
        @endforeach
    </select>
    @error($field_name)
    <span class="text-danger ml-2">{{$message}}</span>
    @enderror
</div>