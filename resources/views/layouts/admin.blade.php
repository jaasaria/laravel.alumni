<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFinest</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">






    <link rel="stylesheet" href=" {{ asset('bootstrap/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/datatables/dataTables.bootstrap.css') }} ">

    <link rel="stylesheet" href=" {{ asset('dist/sweetalert/sweetalert.css') }} ">
    <link rel="stylesheet" href=" {{ asset('dist/icons/ionicons.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('dist/icons/font-awesome-4.6.3/css/font-awesome.min.css') }} ">

    <link rel="stylesheet" href=" {{ asset('dist/css/AdminLTE.min.css') }} ">

    <link rel="stylesheet" href=" {{ asset('dist/css/skins/_all-skins.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('dist/css/toastr.min.css') }} ">
    
    <link rel="stylesheet" href=" {{ asset('dist/css/bootstrap-select.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('plugins/datepicker/datepicker3.css') }} ">


    {{-- datatable print button --}}
    <link rel="stylesheet" href=" {{ asset('css/buttons.dataTables.min.css') }} ">


    @yield('css.import')

    <style type="text/css">        
            @yield('css')
    </style>


</head>
<body class="hold-transition skin-blue sidebar-mini">

<!-- Site wrapper -->
<div class="wrapper">


@include('layouts.admin_header')
@include('layouts.admin_sidebar')



<div class="content-wrapper">
    @yield('notification')
    <section class="content-header">
        <h1>
            @yield('pagetitle')
            <small>@yield('pagesubtitle')</small>
        </h1>
            @yield('breadcrumb')
    </section>

    <section class="content">
        @yield('content')
    </section>

    @yield('notificationfooter')

</div>



@include('layouts.admin_footer')

</div>


{{-- 
<script>
    $("#table1").DataTable();
</script> --}}





<script src=" {{ asset('js/jquery.min.js') }} "></script>

<script src=" {{ asset('bootstrap/js/bootstrap.min.js') }} "></script>
<script src=" {{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }} "></script>
<script src=" {{ asset('plugins/fastclick/fastclick.js') }} "></script>

<script src=" {{ asset('dist/js/app.min.js') }} "></script>
<script src=" {{ asset('dist/js/demo.js') }} "></script>


{{-- under public folder --}}
<script src=" {{ asset('plugins/datatables/jquery.dataTables.min.js') }} "></script>
<script src=" {{ asset('plugins/datatables/dataTables.bootstrap.min.js') }} "></script>

<script src=" {{ asset('dist/sweetalert/sweetalert.min.js') }} "></script>
<script src=" {{ asset('dist/js/toastr.min.js') }} "></script>


<script src=" {{ asset('dist/js/bootstrap-select.min.js') }}"></script>
<script src=" {{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>


{{-- datatable print button --}}
<script src=" {{ asset('js/buttons.print.min.js') }} "></script>
<script src=" {{ asset('js/dataTables.buttons.min.js') }} "></script>



<script src=" {{ asset('js/buttons.flash.min.js') }} "></script>
<script src=" {{ asset('js/jszip.min.js') }} "></script>
<script src=" {{ asset('js/pdfmake.min.js') }} "></script>
<script src=" {{ asset('js/vfs_fonts.js') }} "></script>
<script src=" {{ asset('js/buttons.html5.min.js') }} "></script>




@yield('jsscript')     
@stack('scripts')

</body>
</html>
