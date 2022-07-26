<div class="container-fluid"><link rel="stylesheet" href="assets/custom/css/countrySelect.min.css">

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
                                            <select name="country" id="country-{{$key}}" class="form-control">
                                                @foreach($server->country() as $country)
                                                     <option value="{{$country->code}}">{{$country->name}}</option>
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
                                        <input class="form-control" type="number" id="amount" name="amount" placeholder="Số lượng cần mua" value="1"  required="">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Thời gian mua</label>
                                        <select name="period" id="period" class="form-control"  required="">
                                            <option value="3">3 ngày</option>
                                            <option value="7">1 tuần</option>
                                            <option value="14">2 tuần</option>
                                            <option value="30">1 tháng</option>
                                            <option value="60">2 tháng</option>
                                            <option value="90">3 tháng</option>
                                            <option value="180">6 tháng</option>
                                            <option value="360">12 tháng</option>
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
                                        <div class="alert alert-success text-center">Tổng: <span id="total_price">₫3,300</span></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="proxy6" data-group="server01">Mua ngay</button>
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
}

</script>