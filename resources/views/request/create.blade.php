@extends('layouts.admin')
@section('pagetitle','Academic Documents Request ')
@section('pagesubtitle','')
@section('breadcrumb')
  <ol class="breadcrumb">
	    <li><a href="{{ route('admin.home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Academic Documents Request</li>
   </ol>
@stop


@section("css.import")
    <link rel="stylesheet" href=" {{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} ">    

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
        		<a href=" {{ route('request.list') }} " class="btn btn-success">Back</a>
        	</span>
        </div>


        <div class="row">
            <div class="col-md-12">

                {!! Form::open(['method' => 'POST', 'url' => (empty($data) ? route('request.store'): route('request.update',$data->id))  , 'class' => 'form-vertical']) !!}

                    <div class="col-md-12">

                    <br>




                        <div class="form-group{{ $errors->has('title') ? ' has-error' : ''}} ">

                            <label for="title">Academic Documents (Mutiple Select List)</label>
                            <br>
                            <select  data-width="50%" multiple class="selectpicker" required id="title" name="title">
                                <option value="tr">Transcript</option>
                                <option value="de">Diploma</option>
                                <option value="gm">Good Moral</option>
                                <option value="ot">Others(Specify under Remarks)</option>
                            </select>
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                        </div>       



                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                            {!! Form::label('lblnote', 'Remarks') !!}
                            {!! Form::textarea('description',  (empty($data)? null: $data->description), ['id'=>'description','class' => 'form-control','placeholder'=>'Description', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('description') }}</small>
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
          
   
@endpush 


