@extends('layouts.frontend')
@section('content')
<div class="container-fluid"><!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Cài đặt tài khoản</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-6">
        <!-- profile -->
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Thông tin tài khoản</h4>
                <!-- form -->
                <form id="form-info" class="validate-form mt-2 pt-50">
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Tên đăng nhập</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" value="{{$members->username}}" readonly="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Địa chỉ email</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" value="{{$members->email}}" readonly="">
                        </div>
                    </div>
                </form>

                <!--/ form -->
            </div>
        </div>
        <!-- deactivate account  -->
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Đổi mật khẩu</h4>
                <form action="{{ route('changepass', [$members->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Mật khẩu mới</label>
                        <div class="col-md-9">
                            <input class="form-control" id="password" name="password" type="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-3 col-form-label">Nhập lại mật khẩu mới</label>
                        <div class="col-md-9">
                            <input class="form-control" id="confirm_password" name="confirm_password" type="password">
                        </div>
                    </div>
                    <div class="mb-3 d-grid">
                        <button class="btn btn-danger btn-change-pwd" type="submit">Đổi mật khẩu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection