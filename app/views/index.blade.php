@extends('_master')

@section('title')
	Day-Book
@stop

@section('content')

<div id="login_signup">
@if(!Auth::check())
	<ul>
		<li><a href="/login">LOG IN</a></li>
		<li><a href="/sign_up">SIGN UP</a></li>
	</ul>
@endif
</div>
		<div id="app-name">
			<img src="../images/dottedl.png"><span class="app-name" style="font-size:40px;font-weight:bold;padding-left:20px;padding-right:20px;">DAY BOOK</span><img src="../images/dottedr.png">
		</div>
		<div class="infograph">
			<ul>
				<li>
					<ul>
						<li><img src="../images/how-to-use.png"></li>
						<li><span style="font-weight:bold;font-size:22px;">How to Use</span><br>
						Day Book is a modified version of 5 year Diary. Its allows users to make daily entries. </li>
					</ul>
				<li>
					<ul>
						<li><img src="../images/features.png"></li>
						<li><span style="font-weight:bold;font-size:22px;">Features</span><br>
						The entry space has different sections like Personal,Professional, Fitness which gives a feel of separation of data.</li>
					</ul>
				<li>
					<ul>
						<li><img src="../images/editor.png"></li>
						<li><span style="font-weight:bold;font-size:22px;">Editor Usage</span><br>
						It allows users to format text using different styles. Allows users to include horizontal ruler and links.</li>
					</ul>
				<li>
					<ul>
						<li><img src="../images/implementation.png"></li>
						<li><span style="font-weight:bold;font-size:22px;">Implementation</span><br>
						Based on Laravel framework.The app includes some of the jQuery Widgets such as textEditor, datepicker..</li>
					</ul>
			</ul>
		</div>
@stop
