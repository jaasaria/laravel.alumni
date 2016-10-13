
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
        Home
    </title>



    <link rel="stylesheet" type="text/css" href="http://joshadmin.com/assets/css/frontend/contact.css">

    <link rel="stylesheet" type="text/css" href="http://joshadmin.com/assets/css/lib.css">
    <link rel="stylesheet" type="text/css" href="http://joshadmin.com/assets/css/frontend/tabbular.css">
    <link href="http://joshadmin.com/assets/vendors/animate/animate.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="http://joshadmin.com/assets/css/frontend/jquery.circliful.css">
    <link rel="stylesheet" type="text/css" href="http://joshadmin.com/assets/vendors/owl.carousel/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="http://joshadmin.com/assets/vendors/owl.carousel/css/owl.theme.css">


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




    <script type="text/javascript" src="http://joshadmin.com/assets/js/frontend/lib.js"></script>
    <script src="http://joshadmin.com/assets/js/frontend/style-switcher.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://joshadmin.com/assets/js/frontend/jquery.circliful.js"></script>
    <script src="http://joshadmin.com/assets/vendors/wow/js/wow.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://joshadmin.com/assets/vendors/owl.carousel/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="http://joshadmin.com/assets/js/frontend/carousel.js"></script>
    <script type="text/javascript" src="http://joshadmin.com/assets/js/frontend/index.js"></script>

    @yield('js')

    <!-- end page level js -->
    <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-53569782-1', 'auto');
          ga('send', 'pageview');
    </script>

    

</body>

</html>
