@extends('_master')

@section('title')
	{{Auth::user()->first_name}}_Professional_Day-Book
@stop

<!------------ Path to logic part of professional_day_book ------------>
<?php $path = app_path().'/controllers/professional_day_book-logic.php';
	require $path;
?>

<body id="professional">


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
{{ Form::open(array('url' => '/professional_day_book', 'method' => 'POST')) }}

	<!--------------------- SECTIONS - NAVIGATION --------------------
	Includes: Personal Entry,Professional Entry, Fitness and ---------
	 Miscellaneous Entries ------------------------------------------->
	<?php include('/php_includes/section_navigation.php'); ?>
	
	<!---------------- Text Area for Professional Entries ---------------->
	<div class="span-18 last">
		<textarea class="editor professional" name="professional_entry" autocomplete="off" value=""></textarea>
	</div>

	<!------------------------- Closing the FORM ------------------------->	
	{{ Form::submit('Save') }}
	
{{ Form::close() }}	
@stop