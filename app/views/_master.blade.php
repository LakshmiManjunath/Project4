<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title> 
		@section('title')
			Day-Book
		@show
	</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
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
	<h1 id="header-info">DAY BOOK<img src="images/book.png"></h1>

@yield('body')	
<!-- This tag delimits the content section-->
@yield('content')
<div id="footer" class="span-24 last">
	<ul>
		<li>Day Book
			<ul>
				<li><a>How to User</a></li>
				<li><a>Features</a></li>
				<li><a>Editor Usage</a></li>
				<li><a>Implementation</a></li>
			</ul>
		</li>
		<li>About Us
			<ul>
				<li><a>Blog</a></li>
			</ul>
		</li>
		<li>Support
			<ul>
				<li><a>Contact Us</a></li>
			</ul>
		</li>
	</ul>
</div>
@yield('footer')
</div>
</body>
</html>