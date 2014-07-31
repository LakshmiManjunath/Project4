@extends('_master')

@section('title')
	{{Auth::user()->first_name}}_Misc_Day-Book
@stop


<body id="misc">


<div class="username">
<!---------------------- User - Authentication ----------------------->
	@if(Auth::check())
		{{'Hi '.Auth::user()->first_name." ";}}
		<a href='/logout'>Log out </a>	
	@endif
</div>
	
@section('content')

	<!--------------------- Navigation - Bar -------------------------
	Includes: HOME, DAY-BOOK Entries, Comparing Dates ---------------->
	<?php include('/php_includes/top_navigation.php'); ?>

<!--------------------------------- FORM ----------------------------->
{{ Form::open(array('url' => '/misc_day_book', 'method' => 'POST')) }}

	<!--------------------- SECTIONS - NAVIGATION --------------------
	Includes: Personal Entry,Professional Entry, misc and ---------
	 Miscellaneous Entries ------------------------------------------->
	<?php include('/php_includes/section_navigation.php'); ?>
	
	<!---------------- Text Area for Professional Entries ---------------->
	<div class="span-18 last">
		<textarea class="editor misc" name="misc_entry" placeholder="Make professional entries"></textarea>
	</div>

	<!------------------------- Closing the FORM ------------------------->	
	{{ Form::submit('Save') }}
	
{{ Form::close() }}	
@stop