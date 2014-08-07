@extends('_master')

@section('title')
	Login
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
{{ Form::open(array('url' => '/login')) }}
<div class="log-in-div">
	<h2>LOG IN</h2>
    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}
@stop