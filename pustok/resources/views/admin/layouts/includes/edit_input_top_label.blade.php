<div class="form-group">
    <label>{{Str::headline($field_name)}}:</label>
    <input type="text" name="{{$field_name}}" class="form-control" value="{{old($field_name, $field_value)}}">
    @error($field_name)
    <span class="text-danger ml-2">{{$message}}</span>
    @enderror
</div>