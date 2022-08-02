<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box text-center">
                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{$setting->logo}}" alt="logo-sm-light" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{$setting->logo}}" alt="logo-light" height="40">
                    </span>
                </a>

               
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="ri-menu-2-line align-middle"></i>
            </button>

            
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="ri-search-line"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="mb-3 m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Tìm kiếm dịch vụ ...">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
            @if(isset($members))
            <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        
                        <span class="d-none d-xl-inline-block ms-1">{{$members->username}}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-12px, 72px);" data-popper-placement="bottom-end">
                        <!-- item-->
                        <a class="dropdown-item" href="/profile"><i class="ri-user-line align-middle me-1"></i> Thông tin</a>
                        <a class="dropdown-item" href="/payment"><i class="ri-wallet-2-line align-middle me-1"></i> Nạp tiền</a>
                        <a class="dropdown-item" href="/transaction"><i class="ri-lock-unlock-line align-middle me-1"></i> Lịch sử</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/auth/logout"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Đăng xuất</a>
                    </div>
                </div>
         @else
            <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      
                        <span class="d-none d-xl-inline-block ms-1">Khách truy cập</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="/auth/login"><i class="ri-user-line align-middle me-1"></i> Đăng nhập</a>
                        <a class="dropdown-item" href="/auth/register"><i class="ri-wallet-2-line align-middle me-1"></i> Đăng ký</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="/auth/recoverpw"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Quên mật khẩu?</a>
                    </div>
                </div>
        </div>
       @endif
    </div>
    <script>
        $("#page-header-user-dropdown").click(function(){
            $(".dropdown-menu-end").toggle();
        })
    </script>
</header>                  
