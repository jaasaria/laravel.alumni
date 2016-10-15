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
                    <a href=" {{ url('list_jobs') }}">Jobs</a>
                </li>
                 <li class="hidden-xs">
                    <i class="livicon icon3" data-name="angle-double-right" data-size="18" data-loop="true" data-c="#01bc8c" data-hc="#01bc8c"></i>
                    <a href="#">{{ $data->title }}</a>
                </li>

            </ol>

            <div class="pull-right">
                <i class="livicon icon3" data-name="users" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Jobs
            </div>

        </div>
    </div>
@stop



@section('content')
    <div class="row">

            <div class="text-center">
                <h3 class="border-success"><span class="heading_border bg-success" >Jobs</span></h3>
            </div>


            <div class="col-md-12 col-sm-12">
               
                <!-- Feature -->
                <div class="col-sm-12  col-md-12 wow zoomIn" data-wow-duration="1s">
                        
                    

                            <div class="featured-post-wide thumbnail">

                                <div class="featured-text relative-left">
                                    <h3 class="primary">{{ $data->title }}</h3>
                                    <p id="description">
                                        <p>{!! $data->description !!}</p>
                                    </p>
                                <p class="additional-post-wrap">
                                    <span class="additional-post">
                                        <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> By&nbsp; {{ $data->username->name }}
                                    </span>

                                    <span class="additional-post">
                                        <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>{{ $data->created_at->diffForHumans() }}
                                    </span>
                                </p>
                               
                                </div>
                            </div>

                </div>




            </div>
            {{-- end of col md 12 --}}

    </div>
    {{-- end of div row --}}



    <br><br><br>


@stop


