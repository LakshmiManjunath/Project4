<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title> 
		@section('title')
			Day-Book
		@show
	</title>

	<!--  Reference to the minified jQuery library(local copy)  -->
	<script src="js/jquery-1.11.0.min.js" type="text/javascript"> </script>
	
	 <!--  javascript to highlight the navigations  -->
	<script type="text/javascript" src="js/phighlightnavigation.js"> </script>
	
	<!--  jQ plugin for text-editor  -->
	<script src="js/text-editor/jquery-te-1.4.0.min.js" type="text/javascript"></script>
	
	
	<!--  jQ for UI widget datepicker  -->
	<script src="js/ui/jquery-ui.min.js"></script>
	
	<!-- On loading the document, the datepicker and the text-editor widgets are triggered -->
	<script type="text/javascript">
		$(document).ready(function(){
		
	<!--  Triggers date-picker widget -->
    $( "#datepicker" ).datepicker();
	
	<!--  Triggers jQuerytext-editor widget -->
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

		$(".form").submit(function()
		{
			$("#display_data").css( 'display','block' );
		});
});
	
		//$( ".form_input" ).submit( alert( "Successfully updated!!"));


	</script>
	
<!-- CSS ---------------------------------------------------------->

	
	<!--  Style sheet for jQ plugin text-editor  -->
	<link rel="stylesheet" href="css/text-editor/jquery-te-1.4.0.css" type="text/css">
	
	<!--  CSS for UI widget datepicker  -->
	<link rel="stylesheet" href="css/ui/jquery-ui.min.css"> 
	<link rel="stylesheet" href="css/ui/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="css/ui/jquery-ui.structure.min.css">
	
	
	<!--  Customized style sheet for Project 4  -->
	<link rel="stylesheet" href="css/style2.css" type="text/css">
	
	<!--  Link to Google Fonts - Poire One -->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Marcellus+SC|Niconne|Federo|Allerta+Stencil' rel='stylesheet' type='text/css'>
	
	
	

<!-- This tag delimits the header section-->
@yield('head')
@section('flash-message')
	</head>
	<body>
	<div class="current_date">
	<?php 
				date_default_timezone_set('America/New_York');
				echo date("D F-d-Y"); 
	?></div>
	
	@if(Session::get('flash_message'))
			<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

@show

<div class="container"> 
	<!-- Includes the project logo, which is displayed in all the pages of this app-->
	

@yield('body')	
<!-- This tag delimits the content section-->
<div  id="top-navigation">
		<ul>
				<li><a href="/">Day Book</a></li>
				<li><a href="/personal_day_book">NEW ENTRIES</a></li>
				<li><a href="/compare_entries">OLD ENTRIES</a></li>
				<li id="username">
					@if(Auth::check())
						{{"Hi ".Auth::user()->first_name;}}
						<a href='/logout'>Log out </a>	
					@endif
				</li>
		</ul>	
</div>
@yield('content')
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