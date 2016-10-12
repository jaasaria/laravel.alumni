@extends('layouts.admin')

@section('pagetitle','Help')
@section('pagesubtitle','')
@section('breadcrumb')
  	<ol class="breadcrumb">
	    <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Help</li>
   	</ol>
@stop
