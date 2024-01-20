<div class="form-group row">
    <label class="col-form-label col-lg-{{$colLbl}}">{{Str::headline($field_name)}}:</label>
    <div class="col-lg-{{$colInput}}">
        <input type="number" class="form-control" name="{{$field_name}}" value="{{old($field_name, $field_value)}}"
            step="{{$step}}">
    </div>
    @error($field_name)
    <span class="text-danger ml-2">{{$message}}</span>
    @enderror
</div>