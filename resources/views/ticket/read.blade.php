@extends('layouts.admin')

@section('pagetitle','Read Tickets')
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


@include('closure.toastr')

@section('content')

    <div class="box box-primary">

        <div class="box-header with-border">

               <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
               <span class="pull-right">
                  <a href=" {{ route('ticket.index') }}" class="btn btn-primary">Back</a>
               </span>

         </div>

          {{-- {{ $ticket->category }} --}}

         
         <div class="box-body">
            <div class="mailbox-read-info1 with-border1">
                  <div class="row">
                     <div class="col-md-12">
                           <h3 style="margin-left: 10px">Ticket</h3>
                           <div class="col-md-6">
                    
                              <h4><i class="fa fa-clone"></i> <small>Category: <b>{{ $ticket->category }}</b></small></h4>

                              <h4><i class="fa fa-book"></i> <small>Subject: <b>{{ $ticket->subject }}</b></small></h4>

                           </div>
                           <div class="col-md-6">

                              <h4><i class="fa fa-calendar-o"></i> <small>Created Date: <b>{{ $ticket->created_at->diffForHumans() }}</b></small></h4>

                              <h4><i class="fa fa-calendar-o"></i> <small>Modify Date: <b>{{ $ticket->updated_at->diffForHumans() }}</b></small></h4>

                           </div>
                     </div>
                  </div>   
                 
             </div>
         </div>

         <div class="box-footer">
            <div class="row">
               <div class="col-md-12">
                   <div class="mailbox-read-message">
                              {!!  $ticket->description !!}
                     </div>

               </div>
            </div>
         </div>

    </div>







    <div class="box box-info">
          <div class="box-body with-border">
              <div class="col-md-12">
                 <h3>Quick Reply</h3>
                   
                  {!! Form::open(['method' => 'POST', 'url' => (route('ticket.reply',$ticket->id)), 'class' => 'form-vertical']) !!}

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : ''}}">
                                  {!! Form::textarea('description', null, ['class'=>'form-control','placeholder'=>'Description', 'required' => 'required']) !!}
                                  <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div> 

                        <div class="form-group text-center">
                                   {{Form::button('<i class="fa fa-envelope-o"></i>  Reply Ticket', 
                                    array('type' => 'submit','class'=> 'btn btn-primary',))
                                    }}
                        </div>

                  {!! Form::close() !!}

              </div>
        </div>

        <div class="box-footer with-border">     
        </div>

    </div>

@stop

