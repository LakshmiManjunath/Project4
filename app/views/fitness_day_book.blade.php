@extends('_master')

@section('title')
	{{Auth::user()->first_name}}_Fitness_Day-Book
@stop

<!------------ Path to logic part of fitness_day_book ------------>
<?php $path = app_path().'/controllers/fitness_day_book-logic.php';
	require $path;
?>

<body id="fitness">

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
{{ Form::open(array('url' => '/fitness_day_book', 'method' => 'POST')) }}

	<!--------------------- SECTIONS - NAVIGATION --------------------
	Includes: Personal Entry,Professional Entry, Fitness and ---------
	 Miscellaneous Entries ------------------------------------------->
	<?php include('/php_includes/section_navigation.php'); ?>
	
	<!---------------- Text Area for Professional Entries ---------------->
	<div>
		<textarea class="editor fitness" name="fitness_entry" autocomplete="off" value=""></textarea>
	</div>

	<!------------------------- Closing the FORM ------------------------->	
	{{ Form::submit('Save') }}
	
{{ Form::close() }}	
@stop