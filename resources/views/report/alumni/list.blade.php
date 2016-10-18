@extends('layouts.admin')

@section('pagetitle','Reports - Alumni List')
@section('pagesubtitle','')
@section('breadcrumb')
  	<ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Reports - Alumni List</li>
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

	     .td-description{
	        text-overflow: ellipsis;
	        white-space: nowrap;
	        overflow: hidden; 
	        /*padding-left: 1cm*/
	        padding-right: 30px
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


@section('content')
    <div class="box">

        <div class="box-header with-border">
          	<h3 class="box-title">Listing</h3>
          	{{-- <span class="pull-right">
        		<a href=" {{ url('activity/create') }} " class="btn btn-success">Create New</a>
        	</span> --}}
        </div>


		<div class="box-body">
		
			<div class="col-md-12">
			<table id="table" class="table table-striped table-hover table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Fullname</th>
						<th>Address</th>
						<th>Program</th>
						<th>Company Name</th>
						<th>Email</th>

						<th class="text-center" style="width:10%">Status</th>
						<th class="text-center" style="width:10%">Date</th>
						<th class="text-center" style="width:5%">Action</th>
					</tr>
				</thead>
			
					{{-- 	<tfoot>
	                <tr>
	                	<th>Title</th>
	                 	<th>Description</th>
						<th class="text-center">Status</th>
						<th class="text-center">Date</th>
						<th></th>
	                </tr>
	            	</tfoot> --}}

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

				dom: 'Bfrtip',
	    		    buttons: [
	            		'copy', 'csv', 'excel', 'pdf', 'print'
			    ],
                processing: true,
                serverSide: true,
                ajax: '{!! url('report/alumni/data') !!}',
                order: [[1, 'desc']],
                columns: [

                	{ data: 'lastname', name: 'lastname' ,"searchable": true},
                    { data: 'address', name: 'address' ,"searchable": true},
                    { data: 'program', name: 'program' ,"searchable": true},
                    { data: 'companyname', name: 'companyname' ,"searchable": true},
                    { data: 'email', name: 'email' ,"searchable": true},
                    { data: 'xstatus', name: 'xstatus',"searchable": true },
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
                         url:'{{ URL::to('report/alumni/delete') }}',  
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