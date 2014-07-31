@extends('_master')

@section('title')
	{{Auth::user()->first_name}}_Personal_Day-Book
@stop

<!------------ Path to logic part of personal_day_book ------------>
<?php $path = app_path().'/controllers/personal_day_book-logic.php';
	require $path;
?>

<body id="personal">

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
{{ Form::open(array('url' => '/personal_day_book', 'method' => 'POST','autocomplete' => 'off')) }}

	<!--------------------- SECTIONS - NAVIGATION --------------------
	Included: Personal Entry,Professional Entry, Fitness and ---------
	 Miscellaneous Entries ------------------------------------------->
	<?php include('/php_includes/section_navigation.php'); ?>

	<!---------------- Text Area for Professional Entries ---------------->
	<div class="text_input span-18 last">
		<textarea class="editor personal" name="personal_entry" autocomplete="off" value=""></textarea>
	</div>
	
	<!---------------------- Saving the FORM entries --------------------->
	{{ Form::submit('Save') }}
		
{{ Form::close() }}
@stop