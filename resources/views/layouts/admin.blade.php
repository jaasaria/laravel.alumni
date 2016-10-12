<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFinest</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ URL::asset('bootstrap/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('plugins/datatables/dataTables.bootstrap.css') }} ">

    <link rel="stylesheet" href=" {{ URL::asset('dist/sweetalert/sweetalert.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('dist/icons/ionicons.min.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('dist/icons/font-awesome-4.6.3/css/font-awesome.min.css') }} ">

    <link rel="stylesheet" href=" {{ URL::asset('dist/css/AdminLTE.min.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('dist/css/skins/_all-skins.min.css') }} ">

    <link rel="stylesheet" href=" {{ URL::asset('dist/css/toastr.min.css') }} ">

    
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

<script>
    $("#table1").DataTable();
</script>

{{-- <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script> --}}

<script src=" {{ URL::asset('js/jquery.min.js') }} "></script>

<script src=" {{ URL::asset('bootstrap/js/bootstrap.min.js') }} "></script>
<script src=" {{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }} "></script>
<script src=" {{ URL::asset('plugins/fastclick/fastclick.js') }} "></script>

<script src=" {{ URL::asset('dist/js/app.min.js') }} "></script>
<script src=" {{ URL::asset('dist/js/demo.js') }} "></script>




{{-- under public folder --}}
<script src=" {{ URL::asset('plugins/datatables/jquery.dataTables.min.js') }} "></script>
<script src=" {{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js') }} "></script>

<script src=" {{ url::asset('dist/sweetalert/sweetalert.min.js') }} "></script>
<script src=" {{ url::asset('dist/js/toastr.min.js') }} "></script>

@yield('jsscript')     
@stack('scripts')

</body>
</html>
