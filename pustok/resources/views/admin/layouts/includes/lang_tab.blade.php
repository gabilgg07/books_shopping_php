<div class="col-lg-6">
    <div class="card border-{{$color}}">
        <div class="card-header bg-{{$color}} header-elements-inline">
            <span class="card-title font-weight-semibold">{{Str::headline($field_name)}}</span>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="nav nav-sidebar my-2">
                @foreach ($field_value as $lang=>$item)
                @php
                $r_class = $colors[rand(0,
                count($colors)-1)];
                @endphp
                <li class="nav-item">
                    <span
                        class="nav-link text-{{$r_class}} {{array_key_last($field_value)!=$lang?'border-bottom-1 border-bottom-dashed':''}}">
                        {{$item}}
                        <span class="font-size-sm text-right font-weight-normal ml-auto text-{{$r_class}}-300"
                            style="min-width: 50px;">{{$lang}}</span>
                    </span>
                </li>
                @endforeach
            </div>
        </div>
    </div>
</div>