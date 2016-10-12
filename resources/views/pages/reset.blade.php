@extends('layouts.auth')

@section('content')

	 	<div class="login-box-body">
	        <p class="login-box-msg">Reset Password</p>

    
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif


            {!! Form::open(['method' => 'POST', 'url' => ( url('/user/reset') )  , 'class' => 'form-horizontal']) !!}
                {{ csrf_field() }}

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="{{ $email or  old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>



                <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" ">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" ">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <small class="text-danger">{{ $errors->first('password') }}</small>

                    <br>   
                    {!! Form::button('Reset Password', ['type' => 'submit','class' => 'btn btn-primary btn-block btn-flat']) !!} 
                </div>

              
            {!! Form::close() !!}
           
            <div class="loginlink">
                  <a href="{{ url('/') }}">Return to Log-In?</a><br>
            </div>


		</div>

  	
@stop
