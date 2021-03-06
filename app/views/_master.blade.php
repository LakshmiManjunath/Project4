<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title> 
		@section('title')
			Day-Book
		@show
	</title>

	<!--  jQuery.js  -->
	<script src="js/jquery-1.11.0.min.js" type="text/javascript"> </script>
	
	 <!--  js - HighLight Sections on Visit  -->
	<script type="text/javascript" src="js/phighlightnavigation.js"> </script>
	
	<!--  jQ - Text Editor  -->
	<script src="js/text-editor/jquery-te-1.4.0.min.js" type="text/javascript"></script>
		
	<!--  jQ - Date Picker Widget  -->
	<script src="js/ui/jquery-ui.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
		
	<!-- jQuery - Date Picker Widget -->
	$( "#datepicker" ).datepicker();
	$( "#datepicker2" ).datepicker();
	
	<!--  Trigger Text Editor -->
	$(".editor").jqte({titletext:[
        {title:"Text Format"},
        {title:"Font Size"},
        {title:"Select Color"},
        {title:"Bold",hotkey:"B"},
        {title:"Italic",hotkey:"I"},
        {title:"Underline",hotkey:"U"},
        {title:"Ordered List",hotkey:"."},
        {title:"Unordered List",hotkey:","},
        {title:"Subscript",hotkey:"down arrow"},
        {title:"Superscript",hotkey:"up arrow"},
        {title:"Outdent",hotkey:"left arrow"},
        {title:"Indent",hotkey:"right arrow"},
        {title:"Justify Left"},
        {title:"Justify Center"},
        {title:"Justify Right"},
        {title:"Strike Through",hotkey:"K"},
        {title:"Add Link",hotkey:"L"},
        {title:"Remove Link",hotkey:""},
        {title:"Cleaner Style",hotkey:"Delete"},
        {title:"Horizontal Rule",hotkey:"H"}
		]});

	});
	</script>
	
	<!--				CSS - Links		 			-->
	<!-- Text Editor -->
	<link rel="stylesheet" href="css/text-editor/jquery-te-1.4.0.css" type="text/css">
	
	<!--  Date Picker -->
	<link rel="stylesheet" href="css/ui/jquery-ui.min.css"> 
	<link rel="stylesheet" href="css/ui/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="css/ui/jquery-ui.structure.min.css">
	
	
	<!--  P4 CSS  -->
	<link rel="stylesheet" href="css/style.css" type="text/css">
	
	<!-- Google Fonts - Poire One -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

	</head>
@yield('head')

@section('body')
<body>
	<!-- Current Date -->
	<div class="current_date">
	<?php 
				date_default_timezone_set('UTC');
				echo date("D F-d-Y"); 
	?></div>
@show

@section('flash-message')
	<!-- Flash Message -->
	@if(Session::get('flash_message'))
			<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif
@show

<div class="container"> 
	<!-- TOP NAVIGATION -->
	<div  id="top-navigation">
			<ul>
					<li><a id= "home-nav" href="/"><img src= "../images/day_book.png" alt="day_book"></a></li>
					<li><a href="/personal_day_book">NEW ENTRIES</a></li>
					<li><a href="/compare_entries">OLD ENTRIES</a></li>
					<li id="username">
						<!--  Greet User if logged-in -->
						@if(Auth::check())
							{{"Hi ".Auth::user()->first_name;}}
							<a href='/logout'>Log out </a>	
						@endif
					</li>
			</ul>	
	</div>
@yield('content')

<!-- FOOTER -->
	<div id="footer">
		<ul>
			<li>Day Book
				<ul>
					<li><a href="#">How to Use</a>,<a href="#">Features</a><br><a href="#">Editor Usage</a><a href="#">Implementation</a></li>
				</ul>
			</li>
			<li>About Us
				<ul>
					<li><a href="#">Blog</a></li>
				</ul>
			</li>
			<li>Support
				<ul>
					<li><a href="#">Contact Us</a></li>
				</ul>
			</li>
		</ul>
	</div>
@yield('footer')

</div>
</body>
</html>