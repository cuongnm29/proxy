<html>

    <head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{$setting->titlepage}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{$setting->meta}}" name="description">
    <meta content="{{$setting->keyword}}" name="keywords">
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://proxygame.vn/resources/image/1641370152_1072d4ff10476354f97c.png">
    <!-- DataTables -->
    <link href="{{asset('libs/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Bootstrap Css -->
    <link href="{{asset('libs/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="{{asset('libs/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('libs/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <!-- Extra Plugin -->
    <script src="{{asset('libs/js/jquery.min.js')}}"></script>

</head>
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('partials.frontend.header')
        @include('partials.frontend.menu ')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                  @yield('content')
                </div> <!-- container-fluid -->
            </div>
        <!-- End Page-content -->
        @include('partials.frontend.footer')
    </div>
<!-- end main content-->
    </div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset('libs/js/jquery.min.js')}}"></script>
<script src="{{asset('libs/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/js/metisMenu.min.js')}}"></script>
<script src="{{asset('libs/js/waves.min.js')}}" aria-hidden="true"></script>
<!-- Required datatable js -->
<script src="{{asset('libs/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('libs/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('libs/js/buttons.bootstrap4.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('libs/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('libs/js/responsive.bootstrap4.min.js')}}"></script>
<!-- twitter-bootstrap-wizard js -->
<script src="{{asset('libs/js/jquery.bootstrap.wizard.min.js')}}"></script>


<!-- Datatable init js -->
<!-- <script src="{{asset('js/pages/datatables.init.js')}}"></script> -->
<script src="{{asset('libs/js/app.js')}}"></script>


</body>
</html>