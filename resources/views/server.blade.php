@extends('layouts.frontend')
@section('content')
<div class="container-fluid">

<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3">Danh sách {{$package->name}} [Bạn có {{count($orders)}} proxy]</h4>
                <div class="table-responsive">  
                     <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 48px;">#</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Gói: activate to sort column ascending" style="width: 180px;">Gói</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Thông tin: activate to sort column ascending" style="width: 181px;">Thông tin</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Ngày hết hạn: activate to sort column ascending" style="width: 115px;">Ngày hết hạn</th>
                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Ghi chú: activate to sort column ascending" style="width: 151px;">Ghi chú</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($orders as $key=> $orders)
                                        
                              <tr class="{{$key%2 ? 'event':'odd'}}">
                                    <td class="sorting_1">{{$key +1}}</td>
                                    <td>{{$package->name}}</td>
                                    <td> </td>
                                    <td>
                                        {{$orders->created_at}}
                                    </td>
                                    <td></td>
                                    
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