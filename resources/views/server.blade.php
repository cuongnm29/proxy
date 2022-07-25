@extends('layouts.frontend')
@section('content')
<div class="container-fluid"><link rel="stylesheet" href="assets/custom/css/countrySelect.min.css">

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Danh sách Server [Bạn có 0 proxy]</h4>
                <div class="table-responsive">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="200">200</option><option value="500">500</option><option value="1000">1,000</option><option value="-1">All</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                        <thead>
                            <tr role="row"><th class="text-center sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 149px;" aria-sort="ascending" aria-label=": activate to sort column descending"><input type="checkbox" name="ids_all" id="checkall"></th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 182px;" aria-label="Gói: activate to sort column ascending">Gói</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 327px;" aria-label="Thông tin: activate to sort column ascending">Thông tin</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 412px;" aria-label="Ngày hết hạn: activate to sort column ascending">Ngày hết hạn</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 284px;" aria-label="Ghi chú: activate to sort column ascending">Ghi chú</th></tr>
                        </thead>

                        <tfoot>
                            <tr><th class="text-center" rowspan="1" colspan="1"><input type="checkbox" name="ids_all" id="checkall"></th><th rowspan="1" colspan="1">Gói</th><th rowspan="1" colspan="1">Thông tin</th><th rowspan="1" colspan="1">Ngày hết hạn</th><th rowspan="1" colspan="1">Ghi chú</th></tr></tfoot>
                        <tbody style="font-weight:bold">
                                                    <tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item next disabled" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="note-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-note">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <textarea class="form-control" rows="10" id="notes" name="notes"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary btn-save-note">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="renew-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gia hạn <span class="checked-count">0</span> ips</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-renew">
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Lưu ý</h4>
                        <div class="alert-body">
                            Bấm nút tiếp tục thanh toán để xem giá tiền
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thời gian mua</label>
                        <select name="period" id="period" class="form-control" onchange="checkPrice('proxy4')" required="">
                                                            <option value="30">30 ngày</option>
                                                            <option value="60">60 ngày</option>
                                                            <option value="90">90 ngày</option>
                                                            <option value="120">120 ngày</option>
                                                            <option value="150">150 ngày</option>
                                                            <option value="180">180 ngày</option>
                                                            <option value="210">210 ngày</option>
                                                            <option value="240">240 ngày</option>
                                                            <option value="270">270 ngày</option>
                                                            <option value="300">300 ngày</option>
                                                            <option value="330">330 ngày</option>
                                                            <option value="360">360 ngày</option>
                                                    </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-success btn-renew-check" id="btn-renew-check">Tiếp tục thanh toán</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="export-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xuất ra file .txt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-export" action="/api/export/server02" method="post" target="_blank">
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Lưu ý</h4>
                        <div class="alert-body">
                            Bạn có thể thay đổi định dạng vào ô bên dưới
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Định dạng</label>
                        <input type="text" class="form-control" name="format" id="format" value="ip:port:user:pass">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Loại proxy</label>
                        <select name="type" id="type" class="form-control">
                            <option value="http">HTTP</option>
                            <option value="socks5">SOCKS5</option>
                        </select>
                    </div>
                    <input type="hidden" name="action" value="export">
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Tải ngay</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
@endsection