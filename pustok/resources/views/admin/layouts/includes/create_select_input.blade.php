<div class="form-group">
    <label for="{{$field_name}}">Select {{Str::headline($field_label)}}</label>
    <select class="custom-select form-control-border" id="{{$field_name}}" name="{{$field_name}}" value="{{old($field_name)}}">
        <option value="0">{{Str::headline($field_label)}}</option>
        @foreach ($select_items as $item)
        <option @selected((int)old($field_name)===$item->id)
            value="{{$item->id}}"
            >{{$item->$shown_field}}</option>
        @endforeach
    </select>
</div>