@if (session('message'))
<div class="card mb-2">
    <div class="alert alert-{{session('type')}} border-0 alert-dismissible m-0">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        {!!session('message')!!}
    </div>
</div>
@endif