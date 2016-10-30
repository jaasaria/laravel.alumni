@extends('layouts.admin')
@section('pagetitle','Alumni Request')
@section('pagesubtitle','')
@section('breadcrumb')
  <ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Alumni Request</li>
   </ol>
@stop

@section("css.import")
    <style>
        textarea {
           resize: none;
        }

    </style>
@stop

@include('closure.toastr')

@section('content')

    <div class="box">
        <div class="box-header with-border">
          	<h3 class="box-title">From: {{ 
                    ucwords($data->user->name .' ' . $data->user->middlename .' '. $data->user->lastname) 
                }}</h3>

          	<span class="pull-right">
        		<a href=" {{ route('alumni.list') }} " class="btn btn-success">Back</a>
        	</span>
        </div>


        <div class="row">


            <div class="col-md-12">

                {{-- Update Status (close / pending) Panel --}}
                {!! Form::open(['method' => 'POST', 'url' => (empty($data) ? route('alumni.store'): route('alumni.update',$data->id))  , 'class' => 'form-vertical']) !!}

                    <div class="col-md-12">

                    <br>


                        {!! Form::label('lbltitle', 'Subject') !!}
                        {!! Form::text('title1',  (empty($data)? null: $data->title) , ['class' => 'form-control','autofocus'=>'autofocus','readonly','placeholder'=>'Subject', 'required' => 'required']) !!}


                        <label for="documents">Academic Documents (Mutiple Select List)</label>
                        
                        {!!   Form::select('documents1[]', [
                                'tr' => 'Transcript (P350.00)', 
                                'de' => 'Diploma (P350.00)',
                                'hr' => 'Honorable (P350.00)',
                                'gm' => 'Good Moral (P50.00)', 
                                'cf' => 'Certification (P50.00)', 
                                'rr' => 'Red Ribbon (P300.00)', 
                                'ctc' => 'Certified True Copy (P50.00)', 
                                'ot' => 'Others (Specify under Remarks)'
                                ], (empty($data)? null: explode(',', $data->documents)), ['class'=>'selectpicker','disabled','multiple' => 'multiple','required'=>'required','data-width'=>'100%']);
                        !!}    

                        {!! Form::label('lblnote', 'Remarks') !!}
                        {!! Form::textarea('description',  (empty($data)? null: $data->description), ['id'=>'description','class' => 'form-control','readonly','placeholder'=>'Description', 'required' => 'required']) !!}

                        <div class="form-group">
                            <div class="checkbox{{ $errors->has('checkbox_id') ? ' has-error' : '' }}">

                                <label for="chkStatus">

                                    {!! Form::checkbox('chkStatus', 1, (empty($data)? 0: $data->xstatus), ['id' => 'chkStatus']) !!} 

                                    <span class="label label-danger">Assign Request as Close?</span>
                                </label> 
                            </div>
                            <small class="text-danger">{{ $errors->first('chkStatus') }}</small>
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




    @include('closure.message')


@stop

