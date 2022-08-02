@extends('layouts.frontend')
@section('content')
<div class="container-fluid"><!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Hướng dẫn</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @foreach($posts as $post)
        <div class="col-lg-12 col-md-6 col-sm-4">
            <a href="/post/{{$post->id}}/{{$post->slug}}" class="card">
                <div class="row g-0 align-items-center">
                    <div class="col-md-3" style="padding: 10px; height: 200px;">
                        <img class="card-img " src="{{$post->photo}}" alt="{{$post->title}}" style=" width: 100%; height: 100%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 style="font-size: 22px">{{$post->title}}</h1>
                            <p class="card-text">{{$post->title}}</p>
                            <p class="card-text"><small class="text-muted">Đăng vào: {{$post->created_at}}</small></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection