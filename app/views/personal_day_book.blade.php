@extends('_master')

<!-- TITLE - NEW ENTRIES(Personal Section) -->
@section('title')
	{{Auth::user()->first_name}}_Personal_Day-Book
@stop

@section('head')
	<!-- LOGIC -->
	<?php $path = app_path().'/controllers/personal_day_book-logic.php';
		require $path;
	?>
@stop

@section('body')
<body id="personal">
@stop
	
@section('content')
{{ Form::open(array('url' => '/personal_day_book', 'method' => 'POST','autocomplete' => 'off')) }}
	<p class="description"> + Different section <b>(<em> PERSONAL | PROFESSIONAL | FITNESS </em>)</b> provides data separation.<br>
	+ <b>Text Editor features</b> include: Text formatting, Text Color, Strike through, add link, add horizontal rule..</p>
	<!--SECTIONS - NAVIGATION -->
	<div class="category-list">
		<ul>
			<li id="section_personal"><a href="/personal_day_book">PERSONAL</a></li>
			<li id="section_professional"><a href="/professional_day_book">PROFESSIONAL</a></li>
			<li id="section_fitness"><a href="/fitness_day_book">FITNESS</a></li>
		</ul>
	</div>
	<!-- TEXT AREA (Personal-Entry) -->
	<div class="text_input">
		<textarea class="editor personal" name="personal_entry" ></textarea>
	</div>
	
	{{ Form::submit('Save', $attributes = ['id' => 'save_button']) }}
		
{{ Form::close() }}
@stop
