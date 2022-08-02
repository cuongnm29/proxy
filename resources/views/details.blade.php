@extends('layouts.frontend')
@section('content')
<div class="container-fluid"><!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">{{$post->title}}</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div>
                    {!!$post->summary!!}
                    {!!$post->content!!}
                </div>
            </div>
            <div class="card-footer">Date: {{$post->created_at}}</div>
        </div>
    </div>
</div></div>
@endsection