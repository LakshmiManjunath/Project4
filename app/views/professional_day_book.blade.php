@extends('_master')

<!-- TITLE - NEW ENTRIES(Professional Section) -->
@section('title')
	{{Auth::user()->first_name}}_Professional_Day-Book
@stop

@section('head')
	<!-- LOGIC -->
	<?php $path = app_path().'/controllers/professional_day_book-logic.php';
		require $path;
	?>
@stop

@section('body')
<body id="professional">
@stop
	
@section('content')
{{ Form::open(array('url' => '/professional_day_book', 'method' => 'POST')) }}
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
	
	<!-- TEXT AREA (Professional-Entry) -->
	<div class="text_input">
		<textarea class="editor professional" name="professional_entry" autocomplete="off"></textarea>
	</div>

	{{ Form::submit('Save', $attributes = ['id' => 'save_button']) }}
	
{{ Form::close() }}	
@stop
