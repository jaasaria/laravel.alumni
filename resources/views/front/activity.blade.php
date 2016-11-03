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
                    <a href="#">Activities and Events</a>
                </li>

            </ol>

            <div class="pull-right">
                <i class="livicon icon3" data-name="users" data-size="20" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i> Activities and Events
            </div>

        </div>
    </div>
@stop



@section('content')
    <div class="row">

            <div class="text-center">
                <h3 class="border-success"><span class="heading_border bg-success" >Activities and Events</span></h3>
            </div>

            <div class="col-md-12 col-sm-12">
               
                <!-- Feature -->
                <div class="col-sm-8  col-md-8 wow zoomIn" data-wow-duration="2s">
                        
                        <h3 class="small-heading">Listing</h3>


                        @foreach ($datas as $data)
                    

                            <div class="featured-post-wide thumbnail">

                                <div class="featured-text relative-left">
                                    <h3 class="primary"><a href="{{ url('/list_activity/show',$data->id) }}" id="title">{{ $data->title }}</a></h3>

                                    
                                    <p id="description">
                                        <p>{!! $data->description !!}</p>
                                    </p>
                                <p class="additional-post-wrap">
                                    <span class="additional-post">
                                        <i class="livicon" data-name="user" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i> By&nbsp; {{ $data->user->name }}
                                    </span>



                                    <span class="additional-post">
                                        <i class="livicon" data-name="clock" data-size="13" data-loop="true" data-c="#5bc0de" data-hc="#5bc0de"></i>{{ $data->created_at->diffForHumans() }}
                                    </span>
                                </p>
                                <hr>
                                <p class="text-right">
                                    <a href="{{ url('/list_activity/show',$data->id) }}" class="btn btn-primary text-white">Read more</a>
                                </p>
                                </div>
                            </div>

                        @endforeach

                        {!! $datas->render() !!}
                        <br>
                        <br>

                </div>



                <!-- Facebook and Feeds (activity , jobs , feature ) -->
                <div class="col-sm-4   col-md-4 wow zoomIn" data-wow-duration="1s" >
                    <h3 class="small-heading text-center">Tab Widget</h3>

                     <div class="the-box recent">
                        
                        <ul class="media-list media-xs media-dotted">

                            <li class="media">

                                <div class="fb-page" data-href="https://www.facebook.com/Interface-Computer-College-Iloilo-City-856751671058684/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false">
                                   <blockquote cite="https://www.facebook.com/Interface-Computer-College-Iloilo-City-856751671058684/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Interface-Computer-College-Iloilo-City-856751671058684/">Interface Computer College - Iloilo City</a></blockquote>
                                </div>
                                <hr>
                                <h3>Videos</h3>
                                <iframe width="100%" height="380" src="https://www.youtube.com/embed/yLrVgfLcUE8" frameborder="0" allowfullscreen></iframe>

                            </li>
                         
                        </ul>
                    </div>
                </div>

            </div>
            {{-- end of col md 12 --}}

    </div>
    {{-- end of div row --}}
@stop



