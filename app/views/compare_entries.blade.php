@extends('_master')

<!-- TITLE for OLD ENTRIES -->
@section('title')
	{{Auth::user()->first_name}}_Compare_Day-Book
@stop

@section('head')
	<!-- LOGIC -->
	<?php $path = app_path().'/controllers/compare_entries-logic.php';
		require $path;
	?>
@stop

@section('body')
<body class="compare_entries">
@stop

@section('content')
{{ Form::open(array('url' => '/compare_entries', 'method' => 'POST','class'=>'form')) }}
	<p class="description"> + Choose atleast one date <br>
	+ Allows you to retrieve entries of any two days at once<br>
	+ Allows you to compare different sections for each day</p>
	<div class = "date-picker">
		<ul>
			<!-- Input: Date 1 -->
			<li><label>DAY1</label><input id="datepicker" type="text" name="user_date" @if($date_entered){{"value='$date_entered'";}} @endif></li>
			<!-- Input: Date 2 -->
			<li><label>DAY2</label><input id="datepicker2" type="text" name="user_date2" @if($date_entered2){{"value='$date_entered2'";}} @endif></li>
		</ul>
		<input type="submit" value="RETRIEVE" class="retrieve-button">

		<div id="display_data">
			<div id="day1"><span style="color:#999999;text-decoration:underline;">{{$date1;}}</span><br>
				<!--  CHOOSE SECTIONS -->
				<select class="sections" name="section_name_1"> 
					<option value='personal' @if($section_name_1 == 'personal'){{"selected='selected'";}} @endif >personal</option>
					<option value='professional' @if($section_name_1 == 'professional'){{"selected='selected'";}} @endif >professional</option>
					<option value='fitness' @if($section_name_1 == 'fitness'){{"selected='selected'";}} @endif >fitness</option>	
				</select><br>
				<!--  Display Entry for date1 -->
				{{$entry;}}<br>	
			</div >
			
			<div id="day2"><span style="color:#999999;text-decoration:underline;">{{$date2;}}</span><br>
				<!--  CHOOSE SECTIONS -->
				<select class="sections" name="section_name_2"> 
					<option value='personal' @if($section_name_2 == 'personal'){{"selected='selected'";}} @endif >personal</option>
					<option value='professional' @if($section_name_2 == 'professional'){{"selected='selected'";}} @endif >professional</option>
					<option value='fitness' @if($section_name_2 == 'fitness'){{"selected='selected'";}} @endif >fitness</option>				
				</select><br>
				<!--  Display Entry for date2 -->
				{{$entry_2;}}<br>
			</div>
		</div>
	</div>
{{ Form::close() }}
@stop