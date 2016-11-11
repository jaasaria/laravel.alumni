@extends('layouts.auth')


@section('content')

	 	<div class="login-box-body">
	        <p class="login-box-msg">Sign in to start your session</p>

            {!! Form::open(['method' => 'POST', 'url' => ( url('user/login') )  , 'class' => 'form-horizontal']) !!}
                {{ csrf_field() }}

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

                <div class="row">
                    <div class="col-xs-8">
                        {!! Form::checkbox('remember', '1', null, ['id' => 'remember']) !!} Remember
                    </div>
                    <div class="col-xs-4">
                        {!! Form::button('Sign In', ['type' => 'submit','class' => 'btn btn-primary btn-block btn-flat']) !!}
                    </div>
                </div>
              

            <div class="social-auth-links text-center">
              <p>- OR -</p>
              <a href=" {{ url('/auth/redirect/facebook') }} " class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>

              <a  href="{{ url('/auth/redirect/twitter')  }}" class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i> Sign in with Twitter
              </a>


            {{--       
               <a href="{{ route('auth.github') }}" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                 Google+</a>
            </div> --}}



            {!! Form::close() !!}
           
            <div class="loginlink">
                  <a href="{{ url('/user/reset') }}">I forgot my password</a><br>
                  <a href="{{  url('/user/registration') }}" class="text-center">Register a new membership</a>
            </div>


		</div>

  	
@stop
