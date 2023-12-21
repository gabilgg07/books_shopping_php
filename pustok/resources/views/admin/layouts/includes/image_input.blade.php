<div class="form-group row">
    <label class="col-form-label col-lg-2">Upload {{Str::headline($model_name)}} Image</label>
    <div class="col-lg-10">
        <input type="file" id="image_input" class="form-control-uniform" data-fouc="" name="image">
        @error('image')
        <label class="validation-invalid-label">{{$message}}</label>
        @enderror
        <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg. Max
            file
            size 2Mb</span>
    </div>
</div>