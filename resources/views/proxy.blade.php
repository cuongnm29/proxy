@extends('layouts.frontend')
@section('content')

<div class="container-fluid">
<link rel="stylesheet" href="{{asset('libs/css/swiper-bundle.min.css')}}">
<script src="{{asset('libs/js/swiper-bundle.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('libs/css/sweetalert2.min.css')}}">
<script src="{{asset('libs/js/sweetalert2.min.js')}}"></script>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Bảng điều khiển</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<!-- Notice -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 style="font-family: "><span style="" segoe="" ui",="" segoeuipc,="" "san="" francisco",="" "helvetica="" neue",="" helvetica,="" "lucida="" grande",="" roboto,="" ubuntu,="" tahoma,="" "microsoft="" sans="" serif",="" arial,="" sans-serif;="" font-size:="" 15px;="" white-space:="" pre-wrap;"=""><b style=""><font color="#0000ff">Thông báo: Hiện tại hệ thống VNPT Net vừa ghi nhận mất liên lạc trên tuyến cáp biển APG, như vậy hiện nay VNPT đang </font><font color="#ff0000">mất liên lạc trên 2 tuyến cáp biển APG và AAG (chiếm gần 70% lưu lượng tổng).
</font></b></span></h4><h4 style="font-family: "><span style="" segoe="" ui",="" segoeuipc,="" "san="" francisco",="" "helvetica="" neue",="" helvetica,="" "lucida="" grande",="" roboto,="" ubuntu,="" tahoma,="" "microsoft="" sans="" serif",="" arial,="" sans-serif;="" font-size:="" 15px;="" white-space:="" pre-wrap;"=""><b><font color="#0000ff">Vì vậy 1 số dịch vụ VPS, Proxy mà ProxyGame.VN đặt tại DC VNPT bị ảnh hưởng dẫn đến tình trạng kết nối kém, lag đường truyền
Mong quý khách thông cảm và đợi khắc phục từ phía DC VNPT</font></b></span></h4><h4 style="font-family: "><span style="" segoe="" ui",="" segoeuipc,="" "san="" francisco",="" "helvetica="" neue",="" helvetica,="" "lucida="" grande",="" roboto,="" ubuntu,="" tahoma,="" "microsoft="" sans="" serif",="" arial,="" sans-serif;="" font-size:="" 15px;="" white-space:="" pre-wrap;"=""><b style=""><font color="#0000ff">
Trân trọng !</font></b></span><br></h4>            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-5">
        <div class="text-center mb-5">
            <h1>Chọn gói proxy cần mua</h1>
            <p class="text-muted" style="font-size: 18px">Hệ Thống Mua Proxy Tự Động Và Khởi Tạo Nhanh Chóng, Support 24/7</p>
        </div>
    </div>
</div>

<!-- Created proxy -->
<div class="row">
    <!-- start form -->
    @foreach($services  as $key=> $service)
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex mb-1">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-cube font-size-20"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-16">{{$service->name}}</h5>
                        <p class="text-muted">{{$service->description}}</p>
                    </div>
                </div>
                <div class="py-4 border-bottom">
                    <h4> <span class="font-size-16">{{$service->content}}</span></h4>
                    <div>
                        <label class="form-label">Chọn máy chủ</label>
                        <select class="form-control" id="server-{{$key}}" name="server" onchange= "changeserver($(this).val(),{{$key}})">
                        @foreach($service->server as $server)
                            <option value="{{$server->id}}">{{$server->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-2">
                        <form class="form form-vertical" id="form-proxy6" method="post" action="/api/create">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Quốc gia</label>
                                        <div class="input-group">
                                            <select name="country" id="country-{{$key}}" class="form-control" onchange="changeCountries($(this).val(),{{$key}})">
                                                @foreach($server->country() as $country)
                                                     <option value="{{$country->id}}">{{$country->name}}</option>
                                               @endforeach
                                              </select>
                                            <div class="input-group-text">
                                                <span id="country_proxy6" class="flag au"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Số lượng</label>
                                        <input class="form-control" type="number" id="amount-{{$key}}" name="amount" placeholder="Số lượng cần mua" value="1" onchange="checkPrice({{$key}})"  required="">
                                         <span id="remain-{{$key}}"></span>
                                        
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Thời gian mua</label>
                                        <select name="period-{{$key}}" id="period-{{$key}}" class="form-control"  required="">
                                        @foreach($server->time() as $time)
                                            <option value="{{$time->id}}">{{$time->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Mã giảm giá (nếu có)</label>
                                        <input class="form-control" type="text" id="promotion" name="promotion" placeholder="Mã khuyến mãi nếu có">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-2">
                                        <div class="alert alert-success text-center">Tổng: <span id="total_price_{{$key}}">  đ{{ number_format($service->money, 0, '', ',') ?? '' }} </span></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type ="hidden" id="money-{{$key}}" value = "{{$service->money}}">
                                    <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="{{$key}}" >Mua ngay</button>
                                </div>
                            </div>
                        </form>
                                    </div>
            </div>
        </div>
    </div>
   @endforeach

</div>
<!-- Notice -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p><b><font color="#ff0000">Lưu ý: Nghiêm cấm sử dụng Proxy Việt Nam cho các công việc vi phạm pháp luật nước CHXHCN Việt Nam</font></b></p><p><b><font color="#ff0000">Mọi hành động lạm dụng IP sẽ bị block ngay lập tức mà không cần thông báo trước.</font></b></p>            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="iplist-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select IP manually</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-note">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="text-center">Đã chọn: <span class="js-iplist-selected">0</span> ips</div>
                    </div>
                    <div class="mb-3 js-iplist-scrollbar" style="overflow: scroll; max-height: 500px;">
                        <div class="d-grid js-iplist-load"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>

</div>
<script>
function changeserver($id,$key){
    $.ajax({
    url : '/countryServer/'+$id,
    type : 'GET',
    dataType:'json',
    success : function(data) {      
        $("#country-"+$key).empty();        
        $.each(data, function(key,value) {
            $("#country-"+$key).append($('<option value='+value.code+'>'+value.name+'</option>'));
        }); 
    },
    error : function(request,error)
    {
        alert("Request: "+JSON.stringify(request));
    }
});
$.ajax({
    url : '/timeServer/'+$id,
    type : 'GET',
    dataType:'json',
    success : function(data) {      
        $("#period-"+$key).empty();        
        $.each(data, function(key,value) {
            $("#period-"+$key).append($('<option value='+value.code+'>'+value.name+'</option>'));
        }); 
    },
    error : function(request,error)
    {
        alert("Request: "+JSON.stringify(request));
    }
});

}
function changeCountries($countriesid,$key)
{
    $.ajax({
    url : '/remainIp/'+$countriesid,
    type : 'GET',
    dataType:'json',
    success : function(data) {      
        $("#remain-"+$key).html("Avaiable:"+ data);        
    },
    error : function(request,error)
    {
        alert("Request: "+JSON.stringify(request));
    }
});
}
 function checkPrice($key)
 {
   
    let check_out_price = 0;
    check_out_price =  numberFormat($("#amount-"+$key).val() * $("#money-"+$key).val());
    $("#total_price_"+$key).html(check_out_price);

 }
 function numberFormat(num) {
        var formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'VND',
        });

        return formatter.format(num);
    }
    
</script>
<script>
    $(".btn-create").click(function(e) {
        let package = $(e.target).data('package');
        let country = $("#country-"+package).val();
        let server  = $("#server-"+package).val();
        let amount  = $("#amount-"+package).val();
        let period  = $("#period-"+package).val();
        let money  = $("#money-"+package).val();
        swal({
            title: 'Bạn chắc chứ?',
            text: "Bạn đã kiểm tra kỹ đơn hàng chưa?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Mua ngay',
            cancelButtonText: 'Huỷ'
        }).then((result) => {
            if (result) {
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : '/createOrder/'+server+"/"+country+"/"+amount+"/"+period+"/"+money,
                type : 'POST',
                dataType:'json',
                success : function(data) {      
                 alert(data);
                },
                error : function(request,error)
                {
                    alert("Request: "+JSON.stringify(request));
                }
            });
            }
        })
    })
</script>
@endsection