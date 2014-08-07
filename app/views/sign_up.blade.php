@extends('_master')

@section('title')
	Sign-Up
@stop

@section('content')
<div id="login_signup" >
@if(!Auth::check())
	<ul>
		<li><a href="/login">LOG IN</a></li>
		<li><a href="/sign_up">SIGN UP</a></li>
	</ul>
@endif
</div>

@foreach($errors->all() as $message) 
    <div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/sign_up')) }}
<div class="sign-up-div">	
<h2>SIGN UP</h2>
	First Name<br>
    {{ Form::text('first_name') }}<br><br>
	
	Last Name<br>
    {{ Form::text('last_name') }}<br><br>
	
    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}
@stop