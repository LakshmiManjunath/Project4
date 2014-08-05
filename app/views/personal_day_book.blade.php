@extends('_master')

@section('title')
	{{Auth::user()->first_name}}_Personal_Day-Book
@stop

<!------------ Path to logic part of personal_day_book ------------>
<?php $path = app_path().'/controllers/personal_day_book-logic.php';
	require $path;
?>

<body id="personal">

@section('content')

<!--------------------------------- FORM ----------------------------->
{{ Form::open(array('url' => '/personal_day_book', 'method' => 'POST','autocomplete' => 'off')) }}
<div class="category-list">
	<!--------------------- SECTIONS - NAVIGATION --------------------
	Included: Personal Entry,Professional Entry, Fitness and ---------
	 Miscellaneous Entries ------------------------------------------->
	<?php include('/php_includes/section_navigation.php'); ?>
</div>
	<!---------------- Text Area for Professional Entries ---------------->
	<div class="text_input">
		<textarea class="editor personal" name="personal_entry" autocomplete="off" value=""></textarea>
	</div>
	
	<!---------------------- Saving the FORM entries --------------------->
	{{ Form::submit('Save') }}
		
{{ Form::close() }}
@stop