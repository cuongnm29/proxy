@extends('layouts.frontend')
@section('content')
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
                <h4 style="font-family: "><b style=""><font color="#ff0000"><span style="font-family: " comic="" sans="" ms";"="">Chào mừng bạn đến với website ProxyGame.VN</span></font></b></h4><h4 style="font-family: "></h4><h5><b style=""><span style="" comic="" sans="" ms";"=""><font color="#424242">Các dịch vụ chúng tôi cung cấp: </font></span></b></h5><h5><b style=""><span style="" comic="" sans="" ms";"=""><font color="#424242">- Proxy Private IPv4, IPv6 các khu vực trên thế giới.</font></span></b></h5><h5><b style=""><span style="" comic="" sans="" ms";"=""><font color="#424242">- Proxy mạng khoẻ chơi game.</font></span></b></h5><h5><b style=""><span style="" comic="" sans="" ms";"=""><font color="#424242">- VPS chính hãng: VN, US, Sing, Đức, Anh, Pháp...</font></span></b></h5><h6><span style="" comic="" sans="" ms";"=""><b><font color="#0000ff">Mọi vấn đề cần hỗ trợ Liên hệ ngay support website SĐT zalo : 0962866512 để biết thêm thông tin chi tiết.</font></b></span></h6>            </div>
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
                        <h5 class="font-size-16">IPv6 Private Proxy</h5>
                        <p class="text-muted">Chỉ cho một người dùng.</p>
                    </div>
                </div>
                <div class="py-4 border-bottom">
                    <h4>3,300 <sup><small>đ</small></sup> / <span class="font-size-16">1 proxy / 3 ngày</span></h4>
                    <div>
                        <label class="form-label">Chọn máy chủ</label>
                        <select class="form-control" onchange="setForm()">
                            <option value="ipv4-private1">IPv6 Private Server 1</option>
                        </select>
                    </div>
                </div>

                <div class="mt-2">
                                            <form class="form form-vertical" id="form-proxy6" method="post" action="/api/create">
                            <input type="hidden" name="version" id="version" value="6">
                            <input type="hidden" name="type" id="type" value="http">
                            <input type="hidden" name="group" id="group" value="server01">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Quốc gia</label>
                                        <div class="input-group">
                                            <select name="country" id="country" class="form-control" onchange="setFlag(this,'country_proxy6')">
                                                                                                    <option value="au">Australia</option>
                                                                                                    <option value="ae">United Arab Emirates</option>
                                                                                                    <option value="ca">Canada</option>
                                                                                                    <option value="co">Colombia</option>
                                                                                                    <option value="de">Germany</option>
                                                                                                    <option value="in">India</option>
                                                                                                    <option value="sg">Singapore</option>
                                                                                                    <option value="nl">Netherlands</option>
                                                                                                    <option value="gb">United Kingdom</option>
                                                                                                    <option value="fr">France</option>
                                                                                                    <option value="fi">Finland</option>
                                                                                                    <option value="ua">Ukraine</option>
                                                                                                    <option value="ru">Russia</option>
                                                                                                    <option value="jp">Japan</option>
                                                                                                    <option value="vn">Vietnam</option>
                                                                                                    <option value="us">United States</option>
                                                                                                    <option value="hk">Hong Kong SAR China</option>
                                                                                                    <option value="hu">Hungary</option>
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
                                        <input class="form-control" type="number" id="amount" name="amount" placeholder="Số lượng cần mua" value="1" onchange="checkPrice('proxy6');" required="">

                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Thời gian mua</label>
                                        <select name="period" id="period" class="form-control" onchange="checkPrice('proxy6');" required="">
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
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex mb-1">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-shield-alt font-size-20"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-16">IPv4 Private Proxy</h5>
                        <p class="text-muted">Dedicated Proxy</p>
                    </div>
                </div>
                <div class="py-4 border-bottom">
                    <h4>48,000 <sup><small>đ</small></sup> / <span class="font-size-16">1 proxy / tháng</span></h4>
                    <div>
                        <label class="form-label">Chọn máy chủ</label>
                        <select name="ipv4_server" id="ipv4_server" class="form-control" onchange="setForm()">
                            <option value="ipv4-private1">IPv4 Private Server 1</option>
                            <option value="ipv4-private2" selected="">IPv4 Private Server 2</option>
                            <option value="ipv4-private3">IPv4 Private Server 3</option>
                        </select>
                    </div>
                </div>

                <div class="mt-2">
                                            <form class="form form-vertical ipv4-private1" id="form-proxy4" method="post" action="/api/create" style="display:none">
                            <input type="hidden" name="version" id="version" value="4">
                            <input type="hidden" name="group" id="group" value="server02">
                            <input type="hidden" name="type" id="type" value="http">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Quốc gia</label>
                                        <div class="input-group">
                                            <select name="country" id="country" class="form-control" onchange="setFlag(this,'country_proxy4')">
                                                                                                    <option value="ru">Russia</option>
                                                                                                    <option value="fr">France</option>
                                                                                                    <option value="au">Australia</option>
                                                                                                    <option value="fi">Finland</option>
                                                                                                    <option value="kz">Kazakhstan</option>
                                                                                                    <option value="it">Italy</option>
                                                                                                    <option value="az">Azerbaijan</option>
                                                                                                    <option value="no">Norway</option>
                                                                                                    <option value="in">India</option>
                                                                                                    <option value="gr">Greece</option>
                                                                                                    <option value="qa">Qatar</option>
                                                                                                    <option value="ua">Ukraine</option>
                                                                                                    <option value="pl">Poland</option>
                                                                                                    <option value="by">Belarus</option>
                                                                                                    <option value="gb">United Kingdom</option>
                                                                                                    <option value="nl">Netherlands</option>
                                                                                                    <option value="de">Germany</option>
                                                                                                    <option value="ee">Estonia</option>
                                                                                                    <option value="ge">Georgia</option>
                                                                                                    <option value="am">Armenia</option>
                                                                                                    <option value="md">Moldova</option>
                                                                                                    <option value="be">Belgium</option>
                                                                                                    <option value="ae">United Arab Emirates</option>
                                                                                                    <option value="es">Spain</option>
                                                                                                    <option value="se">Sweden</option>
                                                                                                    <option value="sg">Singapore</option>
                                                                                                    <option value="ar">Argentina</option>
                                                                                                    <option value="id">Indonesia</option>
                                                                                                    <option value="cz">Czechia</option>
                                                                                                    <option value="br">Brazil</option>
                                                                                                    <option value="jp">Japan</option>
                                                                                                    <option value="pt">Portugal</option>
                                                                                                    <option value="ca">Canada</option>
                                                                                                    <option value="ro">Romania</option>
                                                                                                    <option value="pe">Peru</option>
                                                                                                    <option value="cn">China</option>
                                                                                                    <option value="ch">Switzerland</option>
                                                                                                    <option value="tr">Turkey</option>
                                                                                                    <option value="bd">Bangladesh</option>
                                                                                                    <option value="lt">Lithuania</option>
                                                                                                    <option value="lv">Latvia</option>
                                                                                                    <option value="sc">Seychelles</option>
                                                                                                    <option value="mv">Maldives</option>
                                                                                                    <option value="cl">Chile</option>
                                                                                                    <option value="ie">Ireland</option>
                                                                                                    <option value="ph">Philippines</option>
                                                                                                    <option value="co">Colombia</option>
                                                                                                    <option value="th">Thailand</option>
                                                                                                    <option value="dz">Algeria</option>
                                                                                                    <option value="eg">Egypt</option>
                                                                                                    <option value="is">Iceland</option>
                                                                                                    <option value="mc">Monaco</option>
                                                                                                    <option value="ve">Venezuela</option>
                                                                                                    <option value="hu">Hungary</option>
                                                                                                    <option value="at">Austria</option>
                                                                                                    <option value="tm">Turkmenistan</option>
                                                                                                    <option value="uz">Uzbekistan</option>
                                                                                                    <option value="bo">Bolivia</option>
                                                                                                    <option value="ke">Kenya</option>
                                                                                                    <option value="lb">Lebanon</option>
                                                                                                    <option value="mn">Mongolia</option>
                                                                                                    <option value="my">Malaysia</option>
                                                                                                    <option value="py">Paraguay</option>
                                                                                                    <option value="rs">Serbia</option>
                                                                                                    <option value="si">Slovenia</option>
                                                                                                    <option value="zm">Zambia</option>
                                                                                                    <option value="al">Albania</option>
                                                                                                    <option value="jm">Jamaica</option>
                                                                                                    <option value="il">Israel</option>
                                                                                                    <option value="lr">Liberia</option>
                                                                                                    <option value="mx">Mexico</option>
                                                                                                    <option value="uy">Uruguay</option>
                                                                                                    <option value="lk">Sri Lanka</option>
                                                                                                    <option value="mg">Madagascar</option>
                                                                                                    <option value="np">Nepal</option>
                                                                                                    <option value="cu">Cuba</option>
                                                                                                    <option value="bg">Bulgaria</option>
                                                                                                    <option value="za">South Africa</option>
                                                                                                    <option value="cr">Costa Rica</option>
                                                                                            </select>
                                            <div class="input-group-text">
                                                <span id="country_proxy4" class="flag ru"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Số lượng</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="amount" name="amount" value="1" onchange="checkPrice('proxy4')" placeholder="Số lượng">
                                            <button class="input-group-text btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#iplist-modal">Chọn IPs</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 js-iplist-clear" style="display:none">
                                    <div class="mb-2">
                                        <button class="btn btn-danger w-100 btn-iplist-clear" type="button" onclick="ipSelectedReset()">Đặt lại IP</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Thời gian mua</label>
                                        <select name="period" id="period" class="form-control" onchange="checkPrice('proxy4');" required="">
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
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Mã giảm giá (nếu có)</label>
                                        <input class="form-control" type="text" id="promotion" name="promotion" placeholder="Mã khuyến mãi nếu có">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-2">
                                        <div class="alert alert-success text-center">Tổng: <span id="total_price">₫48,000</span></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="proxy4" data-group="server02">Mua ngay</button>
                                </div>
                            </div>
                        </form>
                                        <form class="form form-vertical ipv4-private2" id="form-ipv4" method="post" action="/api/create">
                        <input type="hidden" name="package" id="package" value="ipv4">
                        <input type="hidden" name="group" id="group" value="server03">
                        <input type="hidden" name="type" id="type" value="http">
                        <div class="row">

                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Quốc gia</label>
                                    <div class="input-group">
                                        <select name="country" id="country" class="form-control" onchange="setFlag(this,'country_ipv4')">
                                                                                            <option value="vn">Vietnam</option>
                                                                                            <option value="us">United States</option>
                                                                                    </select>
                                        <div class="input-group-text">
                                            <span id="country_ipv4" class="flag vn"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Số lượng</label>
                                    <input class="form-control" type="text" id="amount" name="amount" onchange="checkPrice('ipv4')" placeholder="Số lượng cần mua" value="1" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Thời gian mua</label>
                                    <select name="period" id="period" class="form-control" onchange="checkPrice('ipv4')" required="">
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
                                    <div class="alert alert-success text-center">Tổng: <span id="total_price">₫48,000</span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="ipv4" data-group="server03">Mua ngay</button>
                            </div>
                        </div>
                    </form>
                                            <form class="form form-vertical ipv4-private3" id="form-proxy4_3" method="post" action="/api/create" style="display:none">
                            <input type="hidden" name="version" id="version" value="4">
                            <input type="hidden" name="group" id="group" value="server02">
                            <input type="hidden" name="type" id="type" value="http">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Quốc gia</label>
                                        <div class="input-group">
                                            <select name="country" id="country" class="form-control" onchange="setFlag(this,'country_ipv4_3')">
                                                                                                    <option value="ru">Russia</option>
                                                                                                    <option value="fr">France</option>
                                                                                                    <option value="au">Australia</option>
                                                                                                    <option value="fi">Finland</option>
                                                                                                    <option value="kz">Kazakhstan</option>
                                                                                                    <option value="it">Italy</option>
                                                                                                    <option value="az">Azerbaijan</option>
                                                                                                    <option value="no">Norway</option>
                                                                                                    <option value="in">India</option>
                                                                                                    <option value="gr">Greece</option>
                                                                                                    <option value="qa">Qatar</option>
                                                                                                    <option value="ua">Ukraine</option>
                                                                                                    <option value="pl">Poland</option>
                                                                                                    <option value="by">Belarus</option>
                                                                                                    <option value="gb">United Kingdom</option>
                                                                                                    <option value="nl">Netherland</option>
                                                                                                    <option value="de">Germany</option>
                                                                                                    <option value="ee">Estonia</option>
                                                                                                    <option value="ge">Georgia</option>
                                                                                                    <option value="am">Armenia</option>
                                                                                                    <option value="md">Moldova</option>
                                                                                                    <option value="be">Belgium</option>
                                                                                                    <option value="ae">OAE</option>
                                                                                                    <option value="es">Spain</option>
                                                                                                    <option value="se">Sweden</option>
                                                                                                    <option value="sg">Singapore</option>
                                                                                                    <option value="ar">Argentina</option>
                                                                                                    <option value="id">Indonesia</option>
                                                                                                    <option value="cz">Czech</option>
                                                                                                    <option value="br">Brazil</option>
                                                                                                    <option value="jp">Japan</option>
                                                                                                    <option value="pt">Portugal</option>
                                                                                                    <option value="ca">Canada</option>
                                                                                                    <option value="ro">Romania</option>
                                                                                                    <option value="pe">Peru</option>
                                                                                                    <option value="cn">China</option>
                                                                                                    <option value="ch">Switzerland</option>
                                                                                                    <option value="tr">Turkey</option>
                                                                                                    <option value="bd">Bangladesh</option>
                                                                                                    <option value="lt">Lithuania</option>
                                                                                                    <option value="lv">Latvia</option>
                                                                                                    <option value="sc">Seychelles</option>
                                                                                                    <option value="mv">Maldives</option>
                                                                                                    <option value="cl">Chile</option>
                                                                                                    <option value="ie">Ireland</option>
                                                                                                    <option value="ph">Philippines</option>
                                                                                                    <option value="co">Colombia</option>
                                                                                                    <option value="th">Thailand</option>
                                                                                                    <option value="dz">Algeria</option>
                                                                                                    <option value="eg">Egypt</option>
                                                                                                    <option value="is">Iceland</option>
                                                                                                    <option value="mc">Monaco</option>
                                                                                                    <option value="ve">Venezuela</option>
                                                                                                    <option value="hu">Hungary</option>
                                                                                                    <option value="at">Austria</option>
                                                                                                    <option value="tm">Turkmenistan</option>
                                                                                                    <option value="uz">Uzbekistan</option>
                                                                                                    <option value="bo">Bolivia</option>
                                                                                                    <option value="ke">Kenya</option>
                                                                                                    <option value="lb">Lebanon</option>
                                                                                                    <option value="mn">Mongolia</option>
                                                                                                    <option value="my">Malaysia</option>
                                                                                                    <option value="py">Paraguay</option>
                                                                                                    <option value="rs">Serbia</option>
                                                                                                    <option value="si">Slovenia</option>
                                                                                                    <option value="zm">Zambia</option>
                                                                                                    <option value="al">Albania</option>
                                                                                                    <option value="jm">Jamaica</option>
                                                                                                    <option value="il">Israel</option>
                                                                                                    <option value="lr">Libya</option>
                                                                                                    <option value="mx">Mexico</option>
                                                                                                    <option value="uy">Uruguay</option>
                                                                                                    <option value="lk">Sri Lanka</option>
                                                                                                    <option value="mg">Madagascar</option>
                                                                                                    <option value="np">Nepal</option>
                                                                                                    <option value="cu">Cuba</option>
                                                                                                    <option value="bg">Bulgaria</option>
                                                                                                    <option value="za">South Africa</option>
                                                                                                    <option value="cr">Costa Rica</option>
                                                                                            </select>
                                            <div class="input-group-text">
                                                <span id="country_ipv4_3" class="flag ru"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Số lượng</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="amount" name="amount" value="1" onchange="checkPrice('proxy4_3')" placeholder="Số lượng">
                                            <button class="input-group-text btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#iplist-modal">Chọn IPs</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 js-iplist-clear" style="display:none">
                                    <div class="mb-2">
                                        <button class="btn btn-danger w-100 btn-iplist-clear" type="button" onclick="ipSelectedReset()">Đặt lại IP</button>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Thời gian mua</label>
                                        <select name="period" id="period" class="form-control" onchange="checkPrice('proxy4_3');" required="">
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
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Mã giảm giá (nếu có)</label>
                                        <input class="form-control" type="text" id="promotion" name="promotion" placeholder="Mã khuyến mãi nếu có">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mt-2">
                                        <div class="alert alert-success text-center">Tổng: <span id="total_price">₫48,000</span></div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="proxy4_3" data-group="server02">Mua ngay</button>
                                </div>
                            </div>
                        </form>
                                    </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex mb-1">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-headset font-size-20"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-16">Proxy Game</h5>
                        <p class="text-muted">Protected</p>
                    </div>
                </div>
                <div class="py-4 border-bottom">
                    <h4>69,000 <sup><small>đ</small></sup> / <span class="font-size-16">1 proxy / tháng</span></h4>
                    <div>
                        <label class="form-label">Chọn máy chủ</label>
                        <select class="form-control" onchange="setForm()">
                            <option value="proxygame-sv1">Proxy Game Server 1</option>
                        </select>
                    </div>
                </div>

                <div class="mt-2">
                    <form class="form form-vertical" id="form-proxygame" method="post" action="/api/create">
                        <input type="hidden" name="package" id="package" value="proxygame">
                        <input type="hidden" name="group" id="group" value="server03">
                        <input type="hidden" name="type" id="type" value="http">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Quốc gia</label>
                                    <div class="input-group">
                                        <select name="country" id="country" class="form-control" onchange="setFlag(this,'country_proxygame')">
                                                                                            <option value="vn">Vietnam</option>
                                                                                    </select>
                                        <div class="input-group-text">
                                            <span id="country_proxygame" class="flag vn"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Số lượng</label>
                                    <input class="form-control" type="number" id="amount" name="amount" placeholder="Số lượng cần mua" value="1" onchange="checkPrice('proxygame');" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Thời gian mua</label>
                                    <select name="period" id="period" class="form-control" onchange="checkPrice('proxygame');" required="">
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
                                    <div class="alert alert-success text-center">Tổng: <span id="total_price">₫69,000</span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="proxygame" data-group="server03">Mua ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex mb-1">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-trophy font-size-20"></i>
                            </span>
                        </div>
                    </div>

                    <div class="flex-grow-1">
                        <h5 class="font-size-16">Socks SSH Private</h5>
                        <p class="text-muted">Sử dụng tối đa 1 người.</p>
                    </div>
                </div>
                <div class="py-4 border-bottom">
                    <h4>135,000 <sup><small>đ</small></sup> / <span class="font-size-16">1 ssh / tháng</span></h4>
                    <div>
                        <label class="form-label">Chọn máy chủ</label>
                        <select class="form-control" onchange="setForm()">
                            <option value="ipv4-private1">Socks SSH Private Server 1</option>
                        </select>
                    </div>
                </div>

                <div class="mt-2">
                    <form class="form form-vertical" id="form-ssh" method="post" action="/api/create">
                        <input type="hidden" name="package" id="package" value="ssh">
                        <input type="hidden" name="group" id="group" value="server03">
                        <input type="hidden" name="type" id="type" value="http">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Quốc gia</label>
                                    <div class="input-group">
                                        <select name="country" id="country" class="form-control" onchange="setFlag(this,'country_ssh')">
                                                                                            <option value="vn">Vietnam</option>
                                                                                    </select>
                                        <div class="input-group-text">
                                            <span id="country_ssh" class="flag vn"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Số lượng</label>
                                    <input class="form-control" type="number" id="amount" name="amount" placeholder="Số lượng cần mua" value="1" onchange="checkPrice('ssh');" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Thời gian mua</label>
                                    <select name="period" id="period" class="form-control" onchange="checkPrice('ssh');" required="">
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
                                    <div class="alert alert-success text-center">Tổng: <span id="total_price">₫135,000</span></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn w-100 btn-success mt-2 btn-create" type="button" data-package="ssh" data-group="server03">Mua ngay</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

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

<!-- Wky -->
<div class="row" style="padding-top: 25px">
    <h2 class="text-center mb-4">Dịch vụ của chúng tôi có ưu điểm</h2>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.05s;">
                
                <h4>Đảm bảo riêng tư &amp; bảo mật</h4>
                <span>Proxy Riêng tư và Không có nhật ký nào liên quan đến tất cả yêu cầu</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.1s;">
                
                <h4>Tốc độ cao</h4>
                <span>Tốc độ cao kết nối với mạng dự phòng 10 gigabit ở hiệu suất cao Chuyên dụng</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.15s;">
               
                <h4>Proxy cho tất cả các thiết bị</h4>
                <span>Không có giới hạn kết nối cho mỗi proxy</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.2s;">
                
                <h4>Mua từ 1 Proxy</h4>
                <span>Bạn có thể mua từ một proxy, số lượng không quan trọng.</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.25s;">
           
                <h4>Nhiều quốc gia proxy</h4>
                <span>ProxyGame cung cấp mạng lưới lớn nhất trên toàn thế giới!</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.3s;">
               
                <h4>Chặn nội dung độc hại</h4>
                <span>Kết nối an toàn Internet được mã hóa</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.35s;">
               
                <h4>Băng thông không giới hạn</h4>
                <span>Các Proxy của chúng tôi không giới hạn băng thông, bạn có thể sử dụng cho nhiều mục đích khác nhau</span>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-4 col-sm-6">
        <div class="card card-body p4">
            <div class="single-service animated fadeInUp" style="animation-duration: 0.6s; animation-delay: 0.55s;">
                
                <h4>Đội ngũ hỗ trợ</h4>
                <span>Đội ngũ hỗ trợ thân thiện làm việc 24/7.</span>
            </div>
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

@endsection
