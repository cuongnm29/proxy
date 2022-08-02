<html lang="en"><head>

    <meta charset="utf-8">
    <title>{{$setting->titlepage}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{$setting->meta}}" name="description">
    <meta content="{{$setting->keyword}}" name="keywords">
    <!-- App favicon -->
    <!-- Bootstrap Css -->
    <link href="{{asset('libs/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('libs/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('libs/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

   
</head>

<body class="bg-pattern" cz-shortcut-listen="true">
    <div class="bg-overlay"></div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="">
                                <div class="text-center">
                                    <a href="/" class="">
                                        <img src="{{$setting->logo}}" alt="" height="40" class="auth-logo logo-dark mx-auto">
                                       
                                    </a>
                                </div>
                                <!-- end row -->
                                <h4 class="font-size-18 text-muted mt-2 text-center">Chào mừng trở lại !</h4>
                                <p class="mb-5 text-center">Đăng nhập để tiếp tục.</p>
                                <form class="form-horizontal" action="{{ route('authMember') }}" method= "POST">
                                @csrf
                                @if(session()->has('status'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('status') }}
                                    </div>
                                @endif
                           
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <label class="form-label" for="username">Tên tài khoản</label>
                                                <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên tài khoản">
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="password">Mật khẩu</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu">
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                                        <label class="form-label" for="customControlInline">Nhớ tài khoản</label>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="text-md-end mt-3 mt-md-0">
                                                        <a href="/auth/recoverpw" class="text-muted"><i class="mdi mdi-lock"></i> Quên mật khẩu?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-4">
                                                <button class="btn btn-primary waves-effect waves-light btn-login" type="submit">Đăng Nhập</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white-50">Bạn chưa có tài khoản ? <a href="/auth/register" class="fw-medium text-primary"> Đăng ký ngay </a> </p>
                        <p class="text-white-50">© <script>
                                document.write(new Date().getFullYear())
                            </script> ProxyGame.</p>
                    </div>
                </div>
            </div>
            }
            <!-- end row -->
        </div>
    </div>
    <!-- end Account pages -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('libs/js/jquery.min.js')}}"></script>
    <script src="{{asset('libs/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('libs/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('libs/js/simplebar.min.js')}}"></script>
    <script src="{{asset('libs/js/waves.min.js')}}"></script>
    <script src="{{asset('libs/js/app.js')}}"></script>

    



</body></html>