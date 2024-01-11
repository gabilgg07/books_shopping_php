<div class="form-group row">
    <label class="col-form-label col-lg-2">{{Str::headline($field_name)}}</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="{{$field_name}}" value="{{old($field_name)}}">
    </div>
    @error($field_name)
    <span class="text-danger ml-2">{{$message}}</span>
    @enderror
</div>