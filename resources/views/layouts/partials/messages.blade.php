@if(isset ($errors) && count($errors) > 0)
<div class="alert alert-danger p-3" role="alert">
    <ul class="list-unstyled mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::get('success', false))
<?php $data = Session::get('success'); ?>
@if (is_array($data))
@foreach ($data as $msg)
<div class="alert alert-success p-3" role="alert">
    <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row p-5 mb-10">
        <i class="ki-duotone ki-notification-bing fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <h4 class="fw-semibold">Alerta</h4>
            <span class="fs-6">{{$data}}</span>
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
        </button>
    </div>
</div>
@endforeach
@else
<div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row p-5 mb-10">
    <i class="ki-duotone ki-notification-bing fs-2hx text-success me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h4 class="fw-semibold">Alerta</h4>
        <span class="fs-6">{{$data}}</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-success"><span class="path1"></span><span class="path2"></span></i>
    </button>
</div>
@endif
@endif

@if(Session::get('danger', false))
<?php $danger = Session::get('danger'); ?>
@if (is_array($danger))
@foreach ($danger as $msg)
<div class="alert alert-danger p-3" role="alert">
    <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
        <i class="ki-duotone ki-notification-bing fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
        <div class="d-flex flex-column pe-0 pe-sm-10">
            <h4 class="fw-semibold">Alerta</h4>
            <span class="fs-6">{{$danger}}</span>
        </div>
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <i class="ki-duotone ki-cross fs-1 text-danger"><span class="path1"></span><span class="path2"></span></i>
        </button>
    </div>
</div>
@endforeach
@else
<div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
    <i class="ki-duotone ki-notification-bing fs-2hx text-danger me-4 mb-5 mb-sm-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <div class="d-flex flex-column pe-0 pe-sm-10">
        <h4 class="fw-semibold">Alerta</h4>
        <span class="fs-6">{{$danger}}</span>
    </div>
    <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
        <i class="ki-duotone ki-cross fs-1 text-danger"><span class="path1"></span><span class="path2"></span></i>
    </button>
</div>
@endif
@endif

@if(session()->has('info_request'))
<div class="alert alert-custom alert-primary shadow-lg fade show mb-5" role="alert">
    <div class="alert-icon"><i class="flaticon-warning"></i></div>
    <div class="alert-text">
        {{ session('info_request') }}
    </div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="ki ki-close"></i></span>
        </button>
    </div>
</div>
@endif