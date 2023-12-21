@if (session('message'))
<div class="alert alert-{{session('type')}} border-0 alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    {!!session('message')!!}
</div>
@endif