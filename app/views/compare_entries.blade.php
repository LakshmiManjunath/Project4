@extends('_master')

@section('title')
	{{Auth::user()->first_name}}_Compare_Day-Book
@stop
@section('head')
<!-- jQuery to run datepicker Widget -->
<script type="text/javascript">
	$(document).ready(function(){
		$( "#datepicker" ).datepicker();
		$( "#datepicker2" ).datepicker();
});
</script>
@stop
<?php $path = app_path().'/controllers/compare_entries-logic.php';
	require $path;
?>
<body class="compare_entries">

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
{{ Form::open(array('url' => '/compare_entries', 'method' => 'POST','class'=>'form')) }}

	<div class = "date-picker">
		<ul>
			<li><label>DAY1</label><input id="datepicker" type="text" name="user_date" @if($date_entered){{"value='$date_entered'";}} @endif></li>
			<li><label>DAY2</label><input id="datepicker2" type="text" name="user_date2" @if($date_entered2){{"value='$date_entered2'";}} @endif></li>
		</ul>
		<input type="submit" value="RETRIEVE" class="retrieve-button">
		<div id="display_data">
			<div id="day1"><span style="color:#999999;text-decoration:underline;">{{$date1;}}</span><br>
				<div>
					<select id="sections" name="section_name_1"> 
						<option value='personal' @if($section_name_1 == 'personal'){{"selected='selected'";}} @endif >personal</option>
						<option value='professional' @if($section_name_1 == 'professional'){{"selected='selected'";}} @endif >professional</option>
						<option value='fitness' @if($section_name_1 == 'fitness'){{"selected='selected'";}} @endif >fitness</option>	
					</select><br>
					{{$entry;}}<br>
				</div>	
			</div >
			<div id="day2"><span style="color:#999999;text-decoration:underline;">{{$date2;}}</span><br>
				<div>
					<select id="sections" name="section_name_2"> 
						<option value='personal' @if($section_name_2 == 'personal'){{"selected='selected'";}} @endif >personal</option>
						<option value='professional' @if($section_name_2 == 'professional'){{"selected='selected'";}} @endif >professional</option>
						<option value='fitness' @if($section_name_2 == 'fitness'){{"selected='selected'";}} @endif >fitness</option>	
					</select><br>
					{{$entry_2;}}
				</div>
			</div>
		</div>
	</div>
@stop