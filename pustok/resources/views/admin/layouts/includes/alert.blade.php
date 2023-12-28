@if (session('message'))
<div class="card mb-2 alert alert-{{session('type')}} alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    {!!session('message')!!}
</div>
@endif