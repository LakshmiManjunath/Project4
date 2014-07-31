@extends('_master')

@section('title')
	Sign-Up
@stop
<h1>Sign up</h1>

@section('content')
{{ Form::open(array('url' => '/sign_up')) }}
	
	First Name<br>
    {{ Form::text('first_name') }}<br><br>
	
	Last Name<br>
    {{ Form::text('last_name') }}<br><br>
	
    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop