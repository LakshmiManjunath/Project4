<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title> 
		@section('title')
			Day-Book
		@show
	</title>

	<link href='http://fonts.googleapis.com/css?family=Marcellus+SC|Niconne|Federo|Allerta+Stencil' rel='stylesheet' type='text/css'>
	<?php 
		/** Including javascript files **/
		include('/php_includes/jquery_includes.php'); 
		
		/** Including css files **/
		include('/php_includes/css_includes.php'); 
	?>
	
	

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