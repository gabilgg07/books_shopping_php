@php
$col = $col ?? 3;
$upper = $upper ?? false;
@endphp

<div class="col-lg-{{$col}} col-md-{{$col===3?'4':'6'}}">
    <div class="card border-left-3 border-left-{{$color}}-400 border-right-3 border-right-{{$color}}-400 rounded-0">
        <div class="card-header">
            <h6 class="card-title">
                <span class="font-weight-semibold">{{Str::headline($field_name)}}:</span>
            </h6>
        </div>
        <div class="card-body">
            <code class="text-{{$color}}"
                style="font-size: 20px;">{{ $upper ? Str::upper($field_value) : $field_value }}</code>
        </div>
    </div>
</div>