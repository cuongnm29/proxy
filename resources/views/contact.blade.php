@extends('layouts.frontend')
@section('content')
<div class="container-fluid"><!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Liên hệ</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {!!$setting->contact!!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection