@extends('layouts.admin')

@section('pagetitle','Tickets')
@section('pagesubtitle','0 New Records')
@section('breadcrumb')
  	<ol class="breadcrumb">
	    <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Ticket</li>
   	</ol> 
@stop


@section('css.import')
    <style>
        .Read_True{
             font-weight: bold;
        }
        
    </style>
@stop


@include('closure.toastr')

@section('content')

  	<div class="box box-primary"> 
        <div class="box-header with-border">
        		<a href=" {{ route('ticket.create') }} " class="btn btn-primary">Compose Ticket</a>
        </div>


        <div class="box-body">
            <div class="table-responsive1 mailbox-messages1">
                {{-- <div class="table table-hover table-striped"> --}}
                            <table id="table" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:10%">Category</th>
                                        <th style="width:20%">Subject</th>
                                        <th style="width:45%">Description</th>
                                        <th class="text-center" style="width:5%"></th>
                                        <th class="text-center" style="width:10%">Date</th>
                                        <th class="text-center" style="width:10%">Status</th>
                                    </tr>
                                </thead>
        
                            </table>
                {{-- </div> --}}
            </div>
        </div>

		
   	</div>

@stop




@push('scripts')
<script>

	$(document).ready(function(){

            $(function() {
               
                $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": true,
                    "bSort": false,
                    "bInfo": false,
                    "bAutoWidth": false,
                    "sPaginationType": "full_numbers",
                    ajax: '{!! route('tickets.get_all_data') !!}',
                    columns: [
                        { data: 'category', name: 'category'},
                        { data: 'subject', name: 'subject'},
                        { data: 'description', name: 'description'}, 
                        { data: 'attachment', name: 'attachment'},
                        { data: 'created_at', name: 'created_at' },
                        { data: 'xstatus', name: 'xstatus'}
                    ]
                });


            });

	});

</script>


@endpush 




