<div class="form-group row">
    <label class="col-form-label col-lg-3">Upload {{Str::headline($model_name)}} Image:</label>
    <div class="col-lg-9">
        <input type="file" id="image_input" class="form-control-uniform" data-fouc="" name="image">
        @error('image')
        <label class="validation-invalid-label">{{$message}}</label>
        @enderror
        <span class="form-text text-muted">Accepted formats: gif, png, jpg, jpeg, svg, webp. Max
            file
            size 2Mb</span>
    </div>
</div>