@extends('layouts.admin')

@section('pagetitle','Home')
@section('pagesubtitle','')

@section('breadcrumb')
  	<ol class="breadcrumb">
	    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
   	</ol>
@stop


@section('css.import')
    <style type="text/css">      


            .content {

					


 @if (Auth::user()->role == 'admin')
  background:url(     {!!   asset('img/dashboard_admin.jpg')  !!}    ) no-repeat center center;
@else
    background:url(     {!!   asset('img/dashboard_alumni.jpg')  !!}    ) no-repeat center center;
@endif



					/*background:url({{ asset('img/dashboard_admin.jpg') }}) no-repeat center center;*/

					min-height:100;
					background-size:cover;
            }

            dashboard_admin



       </style>
@stop
	



@section('content')





@stop



