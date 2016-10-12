<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFinest</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href=" {{ URL::asset('bootstrap/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('dist/icons/ionicons.min.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('dist/icons/font-awesome-4.6.3/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href=" {{ URL::asset('dist/css/AdminLTE.min.css') }} ">


    <style type="text/css">      

            .logobox {
               height:60px;
               border-top: 0;
               width:100%;
               background: url({{ URL::asset('img/logo.png') }}) ; 
            }
            .login-box {
                width: 360px;
                margin-top: 7%;
                margin-right: auto;
                margin-bottom: 7%;
                margin-left: auto;

            }

            .login-logo{
                font-size: 35px;
                text-align: center;
                margin-bottom: 25px;
                font-weight: 300;
                
                
            }
            .login-box-body {
                background: #fff;
                padding: 20px;
                border-top: 0;
                color: #666;
            }

            body {
                background: url({{ URL::asset('img/bg-login.jpg') }}) no-repeat center center fixed; 
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;
                  background-size: cover;@import url();
            }


            .loginlink{
                margin-top: 30px;
            }

            .checkbox, .radio {
                position: relative;
                display: block;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left:  20px;
            }


            @yield('css')

    </style>

</head>

<body>



    <div class="login-box">

        <div class="login-logo">
             <div class="logobox">
            </div>
        </div>

        @yield('content')

       

    </div>




<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../../plugins/fastclick/fastclick.js"></script>

{{-- admin lte sources --}}
<script src="../../dist/js/app.min.js"></script>
<script src="../../dist/js/demo.js"></script>


@yield('jsscript')     
@stack('scripts')


</body>
</html>


