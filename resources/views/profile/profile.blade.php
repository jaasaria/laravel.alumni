@extends('layouts.admin')

@section('pagetitle','Profile')
@section('pagesubtitle','')
@section('breadcrumb')
  	<ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Profile</li>
   	</ol>
@stop

@section('css')
@stop

@include('closure.toastr')


@section('content')
        <div class="row">


        	{{-- left panel --}}
            <div class="col-md-3">
              	<div class="box box-primary">
	                <div class="box-body box-profile">

	                  	<img class="profile-user-img img-responsive img-circle" src=" {{ 'upload/avatars/' . $profile->avatar }}" alt="User profile picture" style="margin-bottom: 5px;">
	                

						<div class="row">
							<div class="col-md-12">

								{!! Form::open(['method' => 'POST', 'route' => 'profile.storeimage', 'class' => 'form-horizontal','enctype'=>'multipart/form-data', 'files'=>true]) !!}

									<div class="col-md-12">
										<div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
										    {!! Form::file('avatar', ['required' => 'required','accept' =>'image/*']) !!}
										    <small class="text-danger">{{ $errors->first('avatar') }}</small>
										</div>
									</div>

									{!! Form::submit('Update Avatar', ['class' => 'btn btn-success btn-block']) !!}


								{!! Form::close() !!}

								<div class="row" style="margin-top: 5px;">
									<div class="col-md-12">
										<button id="btndelete" type="button" class="btn btn-warning btn-block" >Clear Avatar</button>
									</div>
								</div>
								
							</div>
						</div>


                		<p align="center" class="help-block"><small>Requirements: 160x160px, Max: 3MB File</small></p>

                	</div>
              	</div>
            </div>




            <div class="col-md-9">
              	<div class="nav-tabs-custom">

	                <ul class="nav nav-tabs">

	                  	<li {{ (Session::has('tab') ? '':'class=active') }}><a href="#settings" data-toggle="tab">Profile</a></li>
	                 
	   					<li {{ (Session::has('tab') ? 'class=active':'') }}><a href="#account" data-toggle="tab">Account</a></li>

	                  	<li><a href="#activity" data-toggle="tab">Activity Logs</a></li>

	                </ul>



	               	<div class="tab-content">

		                <div class=" {{ (Session::has('tab') ? '':'active') }} tab-pane" id="settings" >

		                        {!! Form::open(['method' => 'POST', 'route' => 'profile.storeprofile', 'class' => 'form-horizontal']) !!}

									{{-- first name --}}
							        <div class="form-group has-feedback {{ $errors->has('firstname') ? ' has-error' : '' }}">
							            <label for="firstname" class="col-sm-2 control-label">First Name</label>
			                            <div class="col-sm-10">
			                            	<input type="text" name="firstname" value="{{(empty($profile)?null:$profile->name)}}" class="form-control" id="firstname" placeholder="Enter First Name" required>
			                         	</div>
							            <small class="text-danger">{{ $errors->first('firstname') }}</small>
							        </div>

							        {{-- middle name --}}
							        <div class="form-group has-feedback {{ $errors->has('middlename') ? ' has-error' : '' }}">
							            <label for="middlename" class="col-sm-2 control-label">Middle Name</label>
			                            <div class="col-sm-10">
			                            	<input type="text" name="middlename" id="middlename" value="{{(empty($profile)?null:$profile->middlename)}}" class="form-control" placeholder="Enter Middle Name" required>
			                         	</div>
							            <small class="text-danger">{{ $errors->first('middlename') }}</small>
							        </div>

							        {{-- lastname name --}}
							        <div class="form-group has-feedback {{ $errors->has('lastname') ? ' has-error' : '' }}">
							            <label for="lastname" class="col-sm-2 control-label">Last Name</label>
			                            <div class="col-sm-10">
			                            	<input type="text" name="lastname" value="{{(empty($profile)?null:$profile->lastname)}}" class="form-control" id="lastname" placeholder="Enter Last Name" required>
			                         	</div>
							            <small class="text-danger">{{ $errors->first('lastname') }}</small>
							        </div>


									{{-- address --}}
									<div class="form-group  has-feedback {{ $errors->has('address') ? ' has-error' : '' }}">
			                            <label for="address" class="col-sm-2 control-label">Address</label>
			                            <div class="col-sm-10">
			                              <textarea class="form-control"  placeholder="Enter Address" required name="address" id="address">{{(empty($profile)?null:$profile->address) }}</textarea>
			                            </div>
			                            <small class="text-danger">{{ $errors->first('address') }}</small>
		                          	</div>


									{{-- mobile --}}
		                          	<div class="form-group  has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">
			                            <label for="mobile" class="col-sm-2 control-label">Tel / Mobile No.</label>
			                            <div class="col-sm-10">
			                               <input type="text" id="mobile" name="mobile"  class="form-control"  placeholder="Enter Telephone / Mobile No." required value="{{(empty($profile)?null:$profile->mobile)}}">

			                            </div>
			                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
			                        </div>


									{{-- citizenship --}}
									<div class="form-group has-feedback {{ $errors->has('Citizenship') ? ' has-error' : '' }}">
			                            <label for="Citizenship" class="col-sm-2 control-label">Citizenship</label>
			                            <div class="col-sm-10">
			                              <input type="text" name="Citizenship"  class="form-control" id="Citizenship" placeholder="Enter Citizenship" required value="{{(empty($profile)?null:$profile->citizenship)}}">
			                            </div>
			                            <small class="text-danger">{{ $errors->first('Citizenship') }}</small>
			                        </div>


									<hr>

									{{-- campus --}}
			                        <div class="form-group  has-feedback {{ $errors->has('campus') ? ' has-error' : '' }}">
			                            <label for="campus" class="col-sm-2 control-label">Campus</label>
			                            <div class="col-sm-10">

										 {!!   Form::select('campus', ['M' => 'Interface Computer College - Manila', 'C' => 'Interface Computer College - Caloocan','I' => 'Interface Computer College - Iloilo', 'D' => 'Interface Computer College - Davao'], (empty($profile)? null: $profile->campus), ['class'=>'selectpicker','placeholder' => 'Select Campus','required'=>'required','data-width'=>'100%']);
										 !!}


			                            </div>
			                            <small class="text-danger">{{ $errors->first('campus') }}</small>
			                        </div>
			                        

									{{-- program --}}
			                        <div class="form-group  has-feedback {{ $errors->has('program') ? ' has-error' : '' }}">
			                            <label for="campus" class="col-sm-2 control-label">Program</label>
			                            <div class="col-sm-10">

							                 {!!   Form::select('program', 
							                 	['OA' => 'BS in Office Administration'
							                 	, 'BA' => 'BS in Business Administration'
							                 	,'CS' => 'BS in Computer Science'
							                 	, 'IT' => 'BS in Information Technology'
							                 	, 'CE' => 'BS in Computer Engineering'
							                 	]
							                 	, (empty($profile)? null: $profile->program), ['class'=>'selectpicker','placeholder' => 'Select Program','required'=>'required','data-width'=>'100%']);
										 !!}

			                            </div>
			                            <small class="text-danger">{{ $errors->first('program') }}</small>
			                        </div>




									{{-- year graduated --}}
			                        <div class="form-group  has-feedback {{ $errors->has('yeargraduated') ? ' has-error' : '' }}">
			                            <label for="campus" class="col-sm-2 control-label">Year Graduated</label>
			                            <div class="col-sm-10">
			                            
			                              <div class="input-group date">
							                  <div class="input-group-addon">
							                    <i class="fa fa-calendar"></i>
							                  </div>
							                    <input type="date" name="yeargraduated" class="form-control pull-right" id="yeargraduated" placeholder="mm/dd/yyyy" required value="{{(empty($profile)?date('Y-m-d'): $profile->yeargraduated) }}">
							                </div>
			                            </div>
			                            <small class="text-danger">{{ $errors->first('yeargraduated') }}</small>
			                        </div>


									<hr>

					
								    {{-- company name --}}
			                        <div class="form-group  has-feedback {{ $errors->has('companyname') ? ' has-error' : '' }}">
			                            <label for="position" class="col-sm-2 control-label">Company Name</label>
			                            <div class="col-sm-10">
			                              <input type="text" name="companyname" class="form-control" id="companyname" placeholder="Enter Company Name" value="{{(empty($profile)?null:$profile->companyname) }}">
			                            </div>
			                            <small class="text-danger">{{ $errors->first('companyname') }}</small>
			                        </div>

								    {{-- company address --}}
			                        <div class="form-group  has-feedback {{ $errors->has('companyadd') ? ' has-error' : '' }}">
			                            <label for="position" class="col-sm-2 control-label">Company Address</label>
			                            <div class="col-sm-10">
			                              <input type="text" name="companyadd" class="form-control" id="companyadd" placeholder="Enter Company Address" value="{{(empty($profile)?null:$profile->companyadd) }}">
			                            </div>
			                            <small class="text-danger">{{ $errors->first('companyadd') }}</small>
			                        </div>



			                       	{{-- job title --}}
			                        <div class="form-group  has-feedback {{ $errors->has('designation') ? ' has-error' : '' }}">
			                            <label for="position" class="col-sm-2 control-label">Job Title</label>
			                            <div class="col-sm-10">
			                              <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Job Title" value="{{(empty($profile)?null:$profile->designation) }}">
			                            </div>
			                            <small class="text-danger">{{ $errors->first('designation') }}</small>
			                        </div>




			                     	
									{{-- notes --}}
			                        <div class="form-group has-feedback {{ $errors->has('notes') ? ' has-error' : ''}} ">
			                            <label for="notes" class="col-sm-2 control-label">Notes</label>
			                            <div class="col-sm-10">
			                              <textarea class="form-control" name="notes"  id="notes" placeholder="Enter Notes">{{(empty($profile)?null:$profile->note)}}</textarea>
			                            </div>
			                             <small class="text-danger">{{ $errors->first('notes') }}</small>
			                        </div>



			                        <div class="form-group">
			                            <div class="col-sm-offset-2 col-sm-10">
			                              <button type="submit" name="updateprofile" class="btn btn-primary">Update Profile</button>
			                            </div>
			                        </div>
		                        {!! Form::close() !!}


		                </div>

		                <div class="{{ (Session::has('tab') ? 'active':'') }} tab-pane" id="account">
		                        <div class="box">

			                        <div class="box-header ">
			                            <h3 class="box-title">Change Your Email Address</h3>
			                        </div>

		                           <div class="box-body">


		                           		{!! Form::open(['method' => 'POST', 'route' => 'profile.storeemail', 'class' => 'form-horizontal']) !!}
		                         


    										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			                                    {!! Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) !!}
			                                    <div class="col-sm-10">
				                                    {!! Form::email('email', (empty($profile) ? null : $profile->email)  , ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter New Email  Address']) !!}
				                                    <small class="text-danger">{{ $errors->first('email') }}</small>	
			                                    </div>
			                                </div>




											<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
											    {!! Form::label('password', 'Password',['class'=>'col-sm-2 control-label']) !!}
											    <div class="col-sm-10">
												    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Enter Current Password']) !!}
												    <small class="text-danger">{{ $errors->first('password') }}</small>
											    </div>
											</div>



			                                <div class="form-group">
			                                    <div class="col-sm-offset-2 col-sm-10">
												{!! Form::submit('Change Email', ['class' => 'btn btn-primary']) !!}
			                                    </div>
			                                </div>
		                           		
		                           		{!! Form::close() !!}






		                           </div>



			                        <div class="box-header ">
			                            <h3 class="box-title">Change Your Password</h3>
			                        </div><!-- /.box-header -->

		                          	 <div class="box-body">

									


{!! Form::open(['method' => 'POST', 'route' => 'profile.storepassword', 'class' => 'form-horizontal']) !!}
	{{-- <div class="col-md-12"> --}}

		<div class="form-group{{ $errors->has('current') ? ' has-error' : '' }}">
	    	{!! Form::label('current', 'Current Password',['class' => 'col-sm-2 control-label']) !!}
	    	<div class="col-sm-10">
		        {!! Form::password('current', ['class' => 'form-control', 'required' => 'required','placeholder' => 'Enter Current Password']) !!}
		    	<small class="text-danger">{{ $errors->first('current') }}</small>
	    	</div>
		</div>


		<div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
	    	{!! Form::label('newpassword', 'New Password',['class' => 'col-sm-2 control-label']) !!}
	    	<div class="col-sm-10">
		        {!! Form::password('newpassword', ['class' => 'form-control', 'required' => 'required','placeholder' => 'New Password']) !!}
		    	<small class="text-danger">{{ $errors->first('newpassword') }}</small>
	    	</div>
		</div>

		<div class="form-group{{ $errors->has('confipassword') ? ' has-error' : '' }}">
	    	{!! Form::label('confipassword', 'Confirm New Password',['class' => 'col-sm-2 control-label']) !!}
	    	<div class="col-sm-10">
		        {!! Form::password('confipassword', ['class' => 'form-control', 'required' => 'required','placeholder' => 'Confirm New Password']) !!}
		    	<small class="text-danger">{{ $errors->first('confipassword') }}</small>
	    	</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			{!! Form::submit('Change Password', ['class' => 'btn btn-primary']) !!}
			</div>

		</div>
		

	{{-- </div> --}}

{!! Form::close() !!}





		                           </div>

		                        </div><!-- /.box -->
		                </div>

	                    <div class="tab-pane" id="activity">
	                        <div class="box">
		                        <div class="box-header">
		                           	<h3 class="box-title">Logs</h3>
		                        </div>
	                          	<div class="box-body">

		                            <table id="tablelogs" class="table table-bordered table-hover">
		                              <thead>
		                                <tr>
		                                  <th>Date and Time Logs</th>
		                                  <th>Task</th>
		                                </tr>
		                              </thead>
		                              <tfoot>
		                                <tr>
		                                  <th>Date and Time Logs</th>
		                                  <th>Task</th>
		                                </tr>
		                              </tfoot>
		                            </table>
	                            </div><!-- /.box-body -->
	                        </div><!-- /.box -->
	                    </div>

	                </div>

              	</div>
            </div>
@stop



@push('scripts')
<script>

	$(function () {
	    $('#datepicker').datepicker({
	      autoclose: true
	    });

	    $('.selectpicker').selectpicker({
		  size: 5
		});
	});





	$(document).ready(function(){

 		$(function() {


            $('#tablelogs').DataTable({
                processing: true,
                searching:false,
                serverSide: true,
                ajax: '{!! route('get_all_logs') !!}',
                order: [[0, 'desc']],
                columns: [
                    { data: 'created_at', name: 'created_at'},
                    { data: 'task', name: 'task', "orderable":false}
                ]
            });
        });







	    $(document).on('click', '#btndelete', function(){  

	       	swal({ title: "Are you sure?",   text: "You will not be able to recover this avatar!",   
	       			type: "warning",   showCancelButton: true,   confirmButtonColor: "#DD6B55",   confirmButtonText: "Yes, delete it!",   closeOnConfirm: true }, 
	       		function(){   

  					var value = {
                        'id':1,
                        _token:$('meta[name="csrf-token"]').attr('content') 
                    };

					$.ajax({  
                         url:'{{ URL::to('profile/deleteimage')  }}',  
                         type:"post",  
                         data: value,  
                         success:function(){ 
                         	// $('#table').DataTable().ajax.reload();

 							document.location.href="{!! route('profile.index'); !!}";
 							

							toastr["success"]("Avatar was successfully deleted.", "Success")
							// location.reload();
                         }  
                    });  
                 });
	    });








});  //end of document ready

</script>
@endpush 