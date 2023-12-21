<div class="col-lg-6">
    <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-{{$color}}">
        <blockquote class="blockquote d-flex mb-0">
            @if ($user->image)
            <div class="mr-3">
                <img class="rounded-circle" src="{{$user->image}}" width="46" height="46" alt="">
            </div>
            @endif

            <div>
                <p class="mb-1">This {{$model_name}} {{$action_name}} by
                    <cite>{{$user->first_name.' '.$user->last_name}}</cite>
                </p>
                <footer class="blockquote-footer">{{Str::headline($action_name)}} At:
                    <cite>{{$date}}</cite>
                </footer>
            </div>
        </blockquote>
    </div>
</div>