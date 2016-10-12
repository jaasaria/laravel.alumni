@extends('layouts.admin')
@section('pagetitle','Note')
@section('pagesubtitle','')
@section('breadcrumb')
  <ol class="breadcrumb">
	    <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Notes</li>
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
        		<a href=" {{ route('note_list') }} " class="btn btn-primary">Back</a>
        	</span>
        </div>






        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['method' => 'POST', 'url' => (empty($Notes) ? route('note_store'): route('note_update',$Notes->id))  , 'class' => 'form-vertical']) !!}

                    <div class="col-md-12">

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}} ">
                            {!! Form::label('lbltitle', 'Title') !!}
                            {!! Form::text('title',  (empty($Notes)? null: $Notes->title) , ['class' => 'form-control','autofocus'=>'autofocus','placeholder'=>'Title', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>       

                        <div class="form-group{{ $errors->has('note') ? ' has-error' : ''}}">
                            {!! Form::label('lblnote', 'Description') !!}
                            {!! Form::textarea('note',  (empty($Notes)? null: $Notes->note), ['class' => 'form-control','placeholder'=>'Description', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('note') }}</small>
                        </div>       
                    
                        <div class="form-group">
                            <div class="checkbox{{ $errors->has('checkbox_id') ? ' has-error' : '' }}">
                                <label for="chkStatus">
                                    {!! Form::checkbox('chkStatus', 1, (empty($Notes)? 0: $Notes->xstatus), ['id' => 'chkStatus']) !!} Assign as Complete?
                                </label> 
                            </div>
                            <small class="text-danger">{{ $errors->first('chkStatus') }}</small>
                        </div>

                    </div>
                    
                    <div class="form-group text-center">
                           {{Form::button('<i class="fa fa-floppy-o"></i>  Save Note', 
                            array('type' => 'submit','class'=> 'btn btn-primary',))
                            }}
                    </div>
            
                    {!! Form::close() !!}
                    
            </div>
        </div>




    </div>
@stop

