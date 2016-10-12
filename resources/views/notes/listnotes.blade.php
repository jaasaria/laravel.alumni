@extends('layouts.admin')

@section('pagetitle','Notes')
@section('pagesubtitle','')
@section('breadcrumb')
  	<ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Note</li>
   	</ol>
@stop


@include('closure.toastr')

@section('css.import')
	
	<style>

		#img-table {
		    margin-right: 10px;
		}

		.groupitem1 {
		    padding: 50 30px 50px 12px;
		    margin: 50px 30px 50px 12px;
		    border-radius: 0;
		    padding-top: 10px;
		    margin-top: 10px;
		}

	     .td-note{
	        text-overflow: ellipsis;
	        white-space: nowrap;
	        overflow: hidden; 
	        padding-left: 1cm; 
	        padding-right: 1cm
	    }

	    .td-title{
	        text-overflow: ellipsis;
	        white-space: nowrap;
	        overflow: hidden; 
	    }

		.center {
		    text-align: center;
		}

		table{
		    table-layout: fixed;
		}



	</style>

@stop


{{-- @section('notification')
	@if ($message = Session::get('success'))
		<div  id="success-alert" class="alert alert-success alert-dismissible text-center">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	         <i class="icon fa fa-check"></i> <strong>Success!</strong> {{ $message }}
      	</div>
	@endif
@stop --}}
{{-- @include('layouts.admin_header') --}}



@section('content')
    <div class="box">

        <div class="box-header with-border">
          	<h3 class="box-title">Listing</h3>
          	<span class="pull-right">
        		<a href=" {{ route('note_create') }} " class="btn btn-primary">Create New</a>
        	</span>
        </div>


		<div class="box-body">
		
			<div class="col-md-12">
			<table id="table" class="table table-striped table-hover " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th style="width:20%">Title</th>
						<th style="width:40%">Notes</th>
						<th class="text-center" style="width:10%">Status</th>
						<th class="text-center" style="width:13%">Date</th>
						<th class="text-center" style="width:10%">Action</th>
					</tr>
				</thead>
			
				<tfoot>
	                <tr>
	                	<th>Title</th>
	                 	<th>Notes</th>
						<th>Status</th>
						<th>Date</th>
						<th></th>
	                </tr>
	            </tfoot>

			</table>	
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
                ajax: '{!! route('get_all_data') !!}',
                order: [[3, 'desc']],
                columns: [
                    { data: 'title', name: 'title' ,"searchable": true},
                    { data: 'note', name: 'note' ,"searchable": true},
                    { data: 'xstatus', name: 'xstatus' },
                    { data: 'created_at', name: 'created_at' ,"searchable": true },
                    { data: 'action', name: 'action', "orderable":false,"defaultContent": ""}
                ]
            });
        });


	    $(document).on('click', '#btndelete', function(){  

		    var href = $(this).data("href");
		    var docid = $(this).data("docid");

	       	swal({ title: "Are you sure?",   text: "You will not be able to recover this record!",   
	       			type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: true }, 
	       		function(){   

  					var value = {
                        'id':docid,
                        _token:$('meta[name="csrf-token"]').attr('content') 
                    };

					$.ajax({  
                         url:'{{ URL::to('notes/delete') }}',  
                         type:"delete",  
                         data: value,  
                         success:function(){ 
                         	$('#table').DataTable().ajax.reload();
							toastr["success"]("Record was successfully deleted.", "Success")
                         }  
                    });  
                 });
	    });


});  //end of document ready

</script>
@endpush 