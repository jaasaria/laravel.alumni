@extends('layouts.auth')

@section('content')

    <div class="login-box-body">
            <p class="login-box-msg">Users Registation</p>

        


            {!! Form::open(['method' => 'POST', 'url' => ( url('/user/register') )  , 'class' => 'form-horizontal']) !!}
                {{ csrf_field() }}
        
                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::text('name', null, ['placeholder'=>'Name','class' => 'form-control', 'required' => 'required']) !!}
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group has-feedback{{ $errors->has('TmcNo') ? ' has-error' : '' }}">
                    {!! Form::text('TmcNo', null, ['placeholder'=>'TMC TR No.','class' => 'form-control', 'required' => 'required']) !!}
                    <small class="text-danger">{{ $errors->first('TmcNo') }}</small>
                    <span class="glyphicon glyphicon-list-alt form-control-feedback"></span>
                </div>
            
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
               
                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                      {!! Form::password('password', ['class' => 'form-control', 'placeholder'=>'Password','required' => 'required']) !!}
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                      <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

                 <div class="form-group has-feedback{{ $errors->has('confirm') ? ' has-error' : '' }}">
                    {!! Form::password('password_confirmation', ['placeholder'=>'Confirm Password','class' => 'form-control', 'required' => 'required']) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first(' confirm') }}</small>

                    <br>   
                    {!! Form::button('Register', ['type' => 'submit','class' => 'btn btn-primary btn-block btn-flat']) !!} 
                </div>

             
            
            {!! Form::close() !!}

            <div class="loginlink">
                  <a href="{{ url('/') }}">Return to Log-In?</a><br>
            </div>

           
    </div>

         
@stop