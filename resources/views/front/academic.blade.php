@extends('front.layout.page')


@section('breadcrumbs')

  <div class="breadcum">
        <div class="container">

            <ol class="breadcrumb">

                <li>
                    <a href=""> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                    </a>
                </li>
                <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">Academic</a>
                </li>

            </ol>

            <div class="pull-right">
                <i class="livicon icon3" data-name="users" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Academic
            </div>


        </div>
    </div>
@stop



@section('content')

    <div class="row">

            <div class="text-center">
                <h3 class="border-success"><span class="heading_border bg-success" >Academic</span></h3>
            </div>


            <!-- left Section Start -->
            <div class="col-md-12 col-sm-12">




                <!-- Responsive Section Start -->
                <div class="col-sm-3 col-md-3 wow zoomIn" data-wow-duration="3s">
                    <div class="box">
                        <div class="box-icon">
                            <i class="livicon icon1" data-name="desktop" data-size="55" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                        </div>
                        <div class="info">
                            <h3 class="success text-center">BS in Office Administration</h3>
                            <p> {!! str_limit($OA,300)  !!}</p>
                            <div class="text-right primary"><a href=" {{ url('/academic/show', $OA ) }} ">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Responsive Section End -->

                <!-- Easy to Use Section Start -->
                <div class="col-sm-3 col-md-3 wow zoomIn" data-wow-duration="3s">
                    <div class="box">
                        <div class="box-icon box-icon1">
                            <i class="livicon icon1" data-name="gears" data-size="55" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>
                        </div>
                        <div class="info">
                            <h3 class="primary text-center">BS in Business Administration</h3>
                            <p> {!! str_limit($BA,300)  !!}</p>
                            <div class="text-right primary"><a href=" {{ url('/academic/show',$BA) }} ">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Easy to use Section End -->

                <!-- Responsive Section Start -->
                <div class="col-sm-3 col-md-3 wow zoomIn" data-wow-duration="3s">
                    <div class="box">
                        <div class="box-icon">
                            <i class="livicon icon1" data-name="desktop" data-size="55" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                        </div>
                        <div class="info">
                            <h3 class="success text-center">BS in Computer Science</h3>
                            <p> {!! str_limit($CS,300)  !!}</p>
                            <div class="text-right primary"><a href="{{ url('/academic/show', $CS ) }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Responsive Section End -->

                <!-- Easy to Use Section Start -->
                <div class="col-sm-3 col-md-3 wow zoomIn" data-wow-duration="3s">
                    <div class="box">
                        <div class="box-icon box-icon1">
                            <i class="livicon icon1" data-name="gears" data-size="55" data-loop="true" data-c="#418bca" data-hc="#418bca"></i>
                        </div>
                        <div class="info">
                            <h3 class="primary text-center">BS in Information Technology</h3>
                            <p> {!! str_limit($IT,300)  !!}</p>
                            <div class="text-right primary"><a href="{{ url('/academic/show', $IT ) }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Easy to use Section End -->


                <!-- Responsive Section Start -->
                <div class="col-sm-3 col-md-3 wow zoomIn" data-wow-duration="3s">
                    <div class="box">
                        <div class="box-icon">
                            <i class="livicon icon1" data-name="desktop" data-size="55" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                        </div>
                        <div class="info">
                            <h3 class="success text-center">BS in Computer Engineering</h3>
                            <p> {!! str_limit($CE,300)  !!}</p>
                            <div class="text-right primary"><a href="{{ url('/academic/show', $CE ) }}">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- //Responsive Section End -->
            </div>
            {{-- end of col md 12 --}}

    </div>
    {{-- end of div row --}}

@stop



