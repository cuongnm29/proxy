<html lang="en"><head>

    <meta charset="utf-8">
    <title>{{$setting->titlepage}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{$setting->meta}}" name="description">
    <meta content="{{$setting->keyword}}" name="keywords">
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://proxygame.vn/resources/image/1641370152_1072d4ff10476354f97c.png">

    <!-- Bootstrap Css -->
    <link href="{{asset('libs/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('libs/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('libs/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
</head>

<body class="bg-pattern" cz-shortcut-listen="true">
    <div class=".b"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="text-center">
                            <a href="/" class="">
                                        <img src="{{$setting->logo}}" alt="" height="40" class="auth-logo logo-dark mx-auto">
                                       
                                    </a>
                            </div>

                            <h4 class="font-size-18 text-muted text-center mt-2">Tạo tài khoản miễn phí</h4>
                            <p class="text-muted text-center mb-4">Đăng ký tài khoản để sử dụng dịch vụ của chúng tôi.</p>
                            <form action="{{ route('createMember') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="username">Tên tài khoản</label>
                                            <input type="text" class="form-control" id="username" name ="username" placeholder="Nhập tên tài khoản">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="email">Địa chỉ Email</label>
                                            <input type="email" class="form-control" id="email" name ="email" placeholder="Nhập địa chỉ email">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label" for="password">Mật khẩu</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="d-grid mt-4">
                                            <button class="btn btn-primary waves-effect waves-light btn-register" type="submit">Đăng Ký</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white-50">Bạn đã có tài khoản ?<a href="/auth/login" class="fw-medium text-primary"> Đăng nhập ngay </a> </p>
                        <p class="text-white-50">© <script>
                                document.write(new Date().getFullYear())
                            </script> ProxyGame.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('/libs/js/jquery.min.js')}}"></script>
    <script src="{{asset('/libs/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{('/libs/js/metisMenu.min.js')}}"></script>
    <script src="{{('/libs/js/simplebar.min.js')}}"></script>
    <script src="{{('/libs/js/waves.min.js')}}"></script>

    <script src="{{('/libs/js/app.js')}}"></script>
    


</body></html>