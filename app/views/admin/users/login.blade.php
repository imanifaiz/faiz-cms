@extends('admin.layouts.user-auth')

@section('title')
	Login to {{ $app_name }}
@stop

@section('content')

	{{ Form::open(array( 'url'=>'/user/login' , 'method'=>'POST' , 'class'=>'form-signin' , 'role'=>'form' )) }}

	    <h1 class="form-signin-heading">Please Sign In</h1>

	    @include('admin.partials.notifications')

	    {{ Form::text('email', Input::old('email') , array( 'placeholder'=>'Username or Email' , 'class'=>'form-control' ) ) }}

	    {{ Form::password('password', array( 'placeholder'=>'Password' , 'class'=>'form-control' ) ) }}

	    <div class="form-group">
	        <label for="remember">
	            {{ Form::hidden('remember', 0) }}
	            {{ Form::checkbox('remember', 1, false, array('id' => 'remember')) }}
	            Remember me
	        </label>
	        <small>
	            <a href="{{ URL::to('/user/forgot_password') }}">(forgot password)</a>
	        </small>
	    </div>

	    {{ Form::submit('Sign In' , array( 'class'=>'btn btn-lg btn-primary btn-block' ) ) }}

	{{ Form::close() }}

@stop