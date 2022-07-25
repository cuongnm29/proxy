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
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Lịch sử nạp tiền</h4>
                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                    <thead>
                        <tr role="row"><th class="sorting_desc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 71px;" aria-label="#: activate to sort column ascending" aria-sort="descending">#</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 239px;" aria-label="Phương thức: activate to sort column ascending">Phương thức</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 183px;" aria-label="Nội dung: activate to sort column ascending">Nội dung</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 156px;" aria-label="Số tiền: activate to sort column ascending">Số tiền</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 225px;" aria-label="Số dư trước: activate to sort column ascending">Số dư trước</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 208px;" aria-label="Số dư cuối: activate to sort column ascending">Số dư cuối</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 186px;" aria-label="Thời gian: activate to sort column ascending">Thời gian</th></tr>
                    </thead>


                    <tbody> <tr class="odd"><td valign="top" colspan="7" class="dataTables_empty">No data available in table</td></tr></tbody>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item next disabled" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div></div></div></div>
            </div>
        </div>
        <!--/ profile -->
    </div>
</div>
</div>
@endsection