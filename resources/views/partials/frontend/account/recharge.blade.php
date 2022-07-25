<div class="container-fluid"><div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p><font style="background-color: rgb(255, 255, 255);"><b style=""><font color="#ff0000">LƯU Ý NẠP TIỀN:</font><font color="#000000">&nbsp;</font><font color="#0000ff">Hệ thống nạp tiền tự động sau 2-10p.</font></b></font></p><p><font style="background-color: rgb(255, 255, 255);"><b style=""><font color="#0000ff">Vui lòng nhập đúng nội dung khi chuyển tiền để không xảy ra lỗi. Quá 10 phút hệ thống chưa update tiền vui lòng liên hệ support Online.</font></b></font></p>            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="alert alert-success bg-success text-white text-center">
            <div class="alert-heading">Hoá đơn có hiệu lực trong 12 giờ kể từ lúc tạo thành công!</div>
        </div>
        <div class="mb-3">
            <button type="button" class="btn btn-danger waves-effect waves-light w-100" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="fa fa-plus me-1"></i> Nạp tiền</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="datatable_length"><label>Show <select name="datatable_length" aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                        <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 48px;">#</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Mã giao dịch: activate to sort column ascending" style="width: 180px;">Mã giao dịch</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Phương thức: activate to sort column ascending" style="width: 181px;">Phương thức</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 115px;">Số tiền</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Trạng thái: activate to sort column ascending" style="width: 151px;">Trạng thái</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 235px;">Thời gian</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Cập nhật: activate to sort column ascending" style="width: 159px;">Cập nhật</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Hành động: activate to sort column ascending" style="width: 158px;">Hành động</th></tr>
                        </thead>
                        <tbody>
                                                            
                                                    <tr class="odd">
                                    <td class="sorting_1">1</td>
                                    <td><a href="/account/payment/PXG721734">#PXG721734</a></td>
                                    <td>Vietcombank</td>
                                    <td>
                                        <font color="red" class="fw-bold">100,000 đ</font>
                                    </td>
                                    <td><span class="badge bg-danger">Hết hạn</span></td>
                                    <td>2022-06-24 23:19:17</td>
                                    <td>30 ngày trước</td>
                                    <td><a href="/account/payment/PXG721734"><i class="fa fa-eye"></i> Chi tiết</a></td>
                                </tr></tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="datatable_previous"><a href="#" aria-controls="datatable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="datatable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="datatable_next"><a href="#" aria-controls="datatable" data-dt-idx="2" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Thêm hoá đơn</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body p-4">
                <form id="form-recharge">
                    <div class="mb-3">
                        <label for="value" class="form-label">Số tiền cần nạp</label>
                        <input type="number" class="form-control" id="value" name="value" placeholder="Số tiền cần nạp" required="">
                    </div>
                    <div class="mb-3">
                        <label for="method" class="form-label">Phương thức thanh toán</label>
                        <select name="method" id="method" class="form-control" required="">
                                                            <option value="1">Vietcombank</option>
                                                    </select>
                    </div>

                    <div class="text-end">
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal">Đóng</button>
                        <button type="button" class="btn btn-success waves-effect waves-light btn-create-invoice">Tiếp tục</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</div>