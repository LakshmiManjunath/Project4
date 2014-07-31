@extends('_master')

@section('title')
	Login
@stop
<h1>Log in</h1>

@section('content')
{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop