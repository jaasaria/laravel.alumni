
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        Home
    </title>

    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/contact.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/lib.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/tabbular.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/jquery.circliful.css') }}">

    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('dist/josh/blog.css') }}">
    

    @yield('css')

</head>


<body>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=428327057312234";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


    <header>
        @include('front.layout.header')
        @include('front.layout.navigation')
    </header>


        @yield('slider')
        @yield('breadcrumbs')

        <div class="container">
            @yield('content')
        </div>

        @include('front.layout.footer')
        @include('front.layout.copyright')


    <script type="text/javascript" src=" {{ asset('dist/josh/js/lib.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('dist/josh/js/style-switcher.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('dist/josh/js/jquery.circliful.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('dist/josh/js/wow.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('dist/josh/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('dist/josh/js/carousel.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('dist/josh/js/index.js') }}"></script>

    @yield('js')


</body>

</html>
