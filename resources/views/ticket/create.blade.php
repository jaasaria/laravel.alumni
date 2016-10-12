@extends('layouts.admin')

@section('pagetitle','Create Ticket')
@section('pagesubtitle','')
@section('breadcrumb')
    <ol class="breadcrumb">
      <li><a href="{{ route('home')  }}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ticket</li>
    </ol> 
@stop

@section('css.import')
   <link rel="stylesheet" href=" {{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} ">
@stop

@section('content')

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">Compose New Ticket</h3>
                <span class="pull-right">
                    <a href=" {{ route('ticket.index') }}" class="btn btn-primary">Back</a>
                </span>
        </div>
  
        <div class="row">
            <div class="col-md-12">

            {!! Form::open(['method' => 'POST', 'url' =>( route('ticket.store') ), 'class' => 'form-vertical']) !!}

                    <div class="col-md-12">
            
                        <div class="form-group">
                          <label>Category:</label>
                            <select class="form-control" name="category" required >
                                <option>Question</option>
                                <option>Billing</option>
                                <option>Procedure</option>
                                <option>Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input class="form-control" name="subject" placeholder="Subject:">
                        </div>
                        <div class="form-group">
                            <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">
                            </textarea>
                        </div>

                        <div class="form-group text-center">
                               {{Form::button('<i class="fa fa-envelope-o"></i>  Send Ticket', 
                                array('type' => 'submit','class'=> 'btn btn-primary',))
                                }}
                        </div>

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



