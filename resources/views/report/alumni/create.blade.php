@extends('layouts.admin')
@section('pagetitle','Alumni Report')
@section('pagesubtitle','')
@section('breadcrumb')
  <ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Alumni Report</li>
   </ol>
@stop


@section("css.import")
    <style>
        textarea {
           resize: none;
        }
    </style>
@stop

@section('content')

    <div class="box">
        <div class="box-header with-border">
          	<h3 class="box-title">Create</h3>
          	<span class="pull-right">
        		<a href=" {{ route('report.alumni.list') }} " class="btn btn-success">Back</a>
        	</span>
        </div>



        <div class="row">
            <div class="col-md-12">

               {!! Form::open(['method' => 'POST', 'url' => (empty($data) ? null: route('report.alumni.update',$data->id))  , 'class' => 'form-horizontal']) !!}

                    <div class="col-md-12">


                        <br>

                        <div class="form-group">
                                <label for="chkStatus" class="col-sm-2 control-label">Alumni Status</label> 
                                <div class="col-sm-10">
                                 {!! Form::checkbox('chkStatus', 1, (empty($data)? 0: $data->xstatus), ['id' => 'chkStatus']) !!}<br>
                                {{-- <p class="text-green">As Verified?</p> --}}
                                 <span class="label label-success"> As Verified?</span>
                                 </div>
                        </div>



                        {{-- first name --}}
                        <div class="form-group has-feedback {{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="firstname" value="{{(empty($data)?null:$data->name)}}" class="form-control" id="firstname" placeholder="Enter First Name" required>
                            </div>
                            <small class="text-danger">{{ $errors->first('firstname') }}</small>
                        </div>

                        {{-- middle name --}}
                        <div class="form-group has-feedback {{ $errors->has('middlename') ? ' has-error' : '' }}">
                            <label for="middlename" class="col-sm-2 control-label">Middle Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="middlename" id="middlename" value="{{(empty($data)?null:$data->middlename)}}" class="form-control" placeholder="Enter Middle Name" required>
                            </div>
                            <small class="text-danger">{{ $errors->first('middlename') }}</small>
                        </div>

                        {{-- lastname name --}}
                        <div class="form-group has-feedback {{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastname" value="{{(empty($data)?null:$data->lastname)}}" class="form-control" id="lastname" placeholder="Enter Last Name" required>
                            </div>
                            <small class="text-danger">{{ $errors->first('lastname') }}</small>
                        </div>


                        {{-- address --}}
                        <div class="form-group  has-feedback {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                              <textarea class="form-control"  placeholder="Enter Address" required name="address" id="address">{{(empty($data)?null:$data->address) }}</textarea>
                            </div>
                            <small class="text-danger">{{ $errors->first('address') }}</small>
                        </div>


                        {{-- mobile --}}
                        <div class="form-group  has-feedback {{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-sm-2 control-label">Tel / Mobile No.</label>
                            <div class="col-sm-10">
                               <input type="text" id="mobile" name="mobile"  class="form-control"  placeholder="Enter Telephone / Mobile No." required value="{{(empty($data)?null:$data->mobile)}}">

                            </div>
                            <small class="text-danger">{{ $errors->first('mobile') }}</small>
                        </div>


                        {{-- citizenship --}}
                        <div class="form-group has-feedback {{ $errors->has('Citizenship') ? ' has-error' : '' }}">
                            <label for="Citizenship" class="col-sm-2 control-label">Citizenship</label>
                            <div class="col-sm-10">
                              <input type="text" name="Citizenship"  class="form-control" id="Citizenship" placeholder="Enter Citizenship" required value="{{(empty($data)?null:$data->citizenship)}}">
                            </div>
                            <small class="text-danger">{{ $errors->first('Citizenship') }}</small>
                        </div>


                        <hr>

                        {{-- campus --}}
                        <div class="form-group  has-feedback {{ $errors->has('campus') ? ' has-error' : '' }}">
                            <label for="campus" class="col-sm-2 control-label">Campus</label>
                            <div class="col-sm-10">

                             {!!   Form::select('campus', ['M' => 'Interface Computer College - Manila', 'C' => 'Interface Computer College - Caloocan','I' => 'Interface Computer College - Iloilo', 'D' => 'Interface Computer College - Davao'], (empty($data)? null: $data->campus), ['class'=>'selectpicker','placeholder' => 'Select Campus','required'=>'required','data-width'=>'100%']);
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
                                    , (empty($data)? null: $data->program), ['class'=>'selectpicker','placeholder' => 'Select Program','required'=>'required','data-width'=>'100%']);
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
                                                <input type="date" id="datepicker1" name="yeargraduated" class="form-control pull-right" id="yeargraduated" placeholder="mm/dd/yyyy" required value="{{(empty($data)?date('Y-m-d'):$data->yeargraduated) }}">
                                            </div>
                                        </div>
                                        <small class="text-danger">{{ $errors->first('yeargraduated') }}</small>
                                    </div>



                        <hr>

        
                        {{-- company name --}}
                        <div class="form-group  has-feedback {{ $errors->has('companyname') ? ' has-error' : '' }}">
                            <label for="position" class="col-sm-2 control-label">Company Name</label>
                            <div class="col-sm-10">
                              <input type="text" name="companyname" class="form-control" id="companyname" placeholder="Enter Company Name" value="{{(empty($data)?null:$data->companyname) }}">
                            </div>
                            <small class="text-danger">{{ $errors->first('companyname') }}</small>
                        </div>

                        {{-- company address --}}
                        <div class="form-group  has-feedback {{ $errors->has('companyadd') ? ' has-error' : '' }}">
                            <label for="position" class="col-sm-2 control-label">Company Address</label>
                            <div class="col-sm-10">
                              <input type="text" name="companyadd" class="form-control" id="companyadd" placeholder="Enter Company Address" value="{{(empty($data)?null:$data->companyadd) }}">
                            </div>
                            <small class="text-danger">{{ $errors->first('companyadd') }}</small>
                        </div>



                        {{-- job title --}}
                        <div class="form-group  has-feedback {{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="position" class="col-sm-2 control-label">Job Title</label>
                            <div class="col-sm-10">
                              <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Job Title" value="{{(empty($data)?null:$data->designation) }}">
                            </div>
                            <small class="text-danger">{{ $errors->first('designation') }}</small>
                        </div>


                        
                        {{-- notes --}}
                        <div class="form-group has-feedback {{ $errors->has('notes') ? ' has-error' : ''}} ">
                            <label for="notes" class="col-sm-2 control-label">Notes</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="notes"  id="notes" placeholder="Enter Notes">{{(empty($data)?null:$data->note)}}</textarea>
                            </div>
                             <small class="text-danger">{{ $errors->first('notes') }}</small>
                        </div>

                     



                    </div>
                    
                    <div class="form-group text-center">
                           {{Form::button('<i class="fa fa-floppy-o"></i> ' . (empty($data)? 'Save Data': 'Update Data'), 
                            array('type' => 'submit','class'=> 'btn btn-success',))
                            }}
                    </div>


            
                    {!! Form::close() !!}

            </div>
        </div>




    </div>
@stop





@push('scripts')
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>  
          
    <script>
        $(function () {
            $("#compose-textarea").wysihtml5();
        }); 
    </script>  
   
@endpush 


