@extends('layouts.admin')
@section('pagetitle','Jobs')
@section('pagesubtitle','')
@section('breadcrumb')
  <ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Jobs</li>
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
        		<a href=" {{ route('jobs.list') }} " class="btn btn-success">Back</a>
        	</span>
        </div>



        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['method' => 'POST', 'url' => (empty($data) ? route('jobs.store'): route('jobs.update',$data->id))  , 'class' => 'form-vertical']) !!}

                    <div class="col-md-12">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}} ">
                            {!! Form::label('lbltitle', 'Title') !!}
                            {!! Form::text('title',  (empty($data)? null: $data->title) , ['class' => 'form-control','autofocus'=>'autofocus','placeholder'=>'Title', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>       

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            {!! Form::label('lblnote', 'Description') !!}
                            {!! Form::textarea('description',  (empty($data)? null: $data->description), ['id'=>'compose-textarea','class' => 'form-control','placeholder'=>'Description', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>       


                    
                        <div class="form-group">
                            <div class="checkbox{{ $errors->has('checkbox_id') ? ' has-error' : '' }}">
                                <label for="chkStatus">
                                    {!! Form::checkbox('chkStatus', 1, (empty($data)? 0: $data->xstatus), ['id' => 'chkStatus']) !!} As Publish?
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
@stop





@push('scripts')
          
    <script>
        $(function () {
            $("#compose-textarea").wysihtml5();
        }); 
    </script>  
   
@endpush 


