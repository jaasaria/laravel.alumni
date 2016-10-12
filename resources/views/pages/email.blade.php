@extends('layouts.auth')

@section('content')

	 	<div class="login-box-body">
	        <p class="login-box-msg">Reset Password</p>

    
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['method' => 'POST', 'url' => ( url('/user/email') )  , 'class' => 'form-horizontal']) !!}
                {{ csrf_field() }}

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">

                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first('email') }}</small>

                    <br>
                    {!! Form::button('Send Password Reset Link', ['type' => 'submit','class' => 'btn btn-primary btn-block btn-flat']) !!}
                </div>
              
            {!! Form::close() !!}
           
            <div class="loginlink">
                  <a href="{{ url('/') }}">Return to Log-In?</a><br>
            </div>


		</div>

  	
@stop
