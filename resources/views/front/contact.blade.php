@extends('front.layout.page')



@section('breadcrumbs')

  <div class="breadcum">
        <div class="container">

            <ol class="breadcrumb">

                <li>
                    <a href="http://joshadmin.com"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">Contact</a>
                </li>

            </ol>

            <div class="pull-right">
                <i class="livicon icon3" data-name="users" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Contact
            </div>

        </div>
    </div>
@stop



@section('content')



    <div class="row">

            <div class="text-center">
                <h3 class="border-success"><span class="heading_border bg-success" >Contact</span></h3>
            </div>


            <div class="col-md-12 col-sm-12">

                <!-- Map -->
                <div class="col-sm-8  col-md-8 wow zoomIn" data-wow-duration="3s">
                        <div id="map" style="width:100%; height:400px;"></div>
                </div>

                  <!-- Address -->
                <div class="col-sm-4   col-md-4 wow zoomIn" data-wow-duration="3s" >
                 
                    <div class="media media-right">
                        <div class="media-left media-top">
                            <a href="#">
                                <div class="box-icon">
                                    <i class="livicon" data-name="home" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                                </div>
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">Address:</h4>
                            {{-- <div class="danger">Jyostna</div> --}}
                            <address>
                                Valiant Building Mabini Street
                                <br>Iloilo City, Philippines
                            </address>
                        </div>
                    </div>

                    <div class="media padleft10">
                        <div class="media-left media-top">
                            <a href="#">
                                <div class="box-icon">
                                    <i class="livicon" data-name="phone" data-size="22" data-loop="true" data-c="#fff" data-hc="#fff"></i>
                                </div>
                            </a>
                        </div>
                        <div class="media-body padbtm2">

                            <h4 class="media-heading">Telephone:</h4>
                            <ul style="list-style: none;">
                                <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i>Phone:(033) 337-7784</li>
                                <li><i class="livicon icon4 icon3" data-name="printer" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i> Fax:(033)111-2222</li>
                                <li><i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc" data-hc="#ccc"></i> Email:<span class="text-success" style="cursor: pointer;">
                                    info@icc-iloilo.com</span>
                                </li>
                                <li><i class="livicon icon4 icon3" data-name="skype" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc"></i> Skype:
                                    <span class="text-success"  style="cursor: pointer;">icc-iloilo</span>
                            </ul>
                        </div>
                    </div>


                </div>




            </div>
            {{-- end of col md 12 --}}

    </div>
    {{-- end of div row --}}



    <br><br><br>


@stop




@section('js')

    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="http://joshadmin.com/assets/vendors/gmaps/js/gmaps.min.js" ></script>
    <script>

            $(document).ready(function() {
                var map = new GMaps({
                    el: '#map',
                    lat: 10.7008083,
                    lng: 122.5535429
                });
                map.addMarker({
                    lat: 10.7008083,
                    lng: 122.5535429,
                    title: 'Interface Computer College Iloilo'
                });
            });
        </script>


        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53569782-1', 'auto');
  ga('send', 'pageview');

</script>



@stop 
