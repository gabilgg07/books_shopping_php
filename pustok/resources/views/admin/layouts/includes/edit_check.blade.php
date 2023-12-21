<div class="form-check form-check-switchery form-check-inline form-check-right mb-2">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input-switchery" name="{{$field_name}}" data-fouc=""
            {{old($field_name,$field_value)?'checked':''}}>
        {{Str::headline($field_name)}} ?
    </label>
</div>