@if (!empty($data))
    {{-- Message Panel --}}
    <div class="box box-success">

        <div class="box-header with-border">
            <h3 class="box-title">Send Message?</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
  
            {!! Form::open(['method' => 'POST', 'url' => ( route('alumni.message'))  , 'class' => 'form-vertical']) !!}

                <div class="col-md-12">
                    <br>

                    {!! Form::hidden('user_id', Auth::user()->id) !!}
                    {!! Form::hidden('request_id', $data->id) !!}

                    <div class="form-group{{ $errors->has('message') ? ' has-error' : ''}}">
                        {!! Form::textarea('message',  null, ['id'=>'message','class' => 'form-control','placeholder'=>'Description', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('message') }}</small>
                    </div>    

                </div>
                
                <div class="form-group text-center">
                       {{Form::button('<i class="fa fa-floppy-o"></i> Send Message' , 
                        array('type' => 'submit','class'=> 'btn btn-success',))
                        }}
                </div>

            {!! Form::close() !!}

            </div>
        </div>
    </div>    

   

    @if (count($data->message) > 0)

    <div class="box-header ui-sortable-handle"">
        <i class="fa fa-comments-o"></i>
        <h3 class="box-title">Inbox </h3><small> Total Message: {{ count($data->message) }} </small>
    </div>

        <ul class="timeline">


              @foreach ($data->message as $message)

                    <li>
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}</span>
                            <h3 class="timeline-header"><a href="#"> {{ $message->user->fullname }} </a></h3>

                            <div class="timeline-body">
                                <article>
                                    {!! html_entity_decode($message->description) !!} 
                                </article>
                            </div>

                            <div class="timeline-footer">
                                <a class="btn btn-success btn-xs">Read more</a>
                            </div> 

                        </div>
                    </li>

                @endforeach

               

        </ul>

    @endif
@endif




@push('scripts')
    <script>
        $(function () {
            $("#message").wysihtml5();
        }); 
    </script>  
@endpush