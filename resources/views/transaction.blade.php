@extends('layouts.frontend')
@section('content')
<div class="container-fluid"><!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Lịch sử giao dịch</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="content-body">
    <div class="card">
        <div class="card-body">
        <div class="table-responsive">  
                     <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 48px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Phương thức: activate to sort column ascending" style="width: 180px;">Phương thức</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Nội dung: activate to sort column ascending" style="width: 181px;">Nội dung</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Số tiền: activate to sort column ascending" style="width: 115px;">Số tiền</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Số dư trước: activate to sort column ascending" style="width: 151px;">Số dư trước</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Số dư sau: activate to sort column ascending" style="width: 151px;">Số dư sau</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Trạng thái: activate to sort column ascending" style="width: 151px;">Trạng thái</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Thời gian: activate to sort column ascending" style="width: 151px;">Thời gian</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($orders as $key=> $order)
                                        
                              <tr class="{{$key%2 ? 'event':'odd'}}">
                                    <td class="sorting_1">{{$key +1}}</td>
                                    <td>Trực tiếp</td>
                                    <td> @foreach($order->servers()->pluck('name') as $server)
                                            <span>{{ $server }}</span>
                                        @endforeach</td>
                                    <td>
                                        {{number_format($order->price, 0, '', ',')}} đ
                                    </td>
                                    <td>
                                    {{number_format($members->point , 0, '', ',')}} đ
                                    </td>
                                    <td>{{number_format(($members->point) - ($members->charge), 0, '', ',')}} đ</td>
                                    <td>Đã Mua</td>
                                    <td>{{$order->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection