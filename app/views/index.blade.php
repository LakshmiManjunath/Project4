@extends('_master')

@section('title')
	Day-Book
@stop


@section('content')
<div  id="top-navigation" class="span-24 last">
		<ul>
				<li><a href="#">HOME</a></li>
				<li><a href="/personal_day_book">DAY BOOK</a></li>
				<li><a href="/compare_entries">OLD ENTRIES</a></li>
				<li id="username">
					@if(Auth::check())
						{{"Hi ".Auth::user()->first_name." ";}}
						<a href='/logout'> Log out </a>	
					@endif
				</li>
		</ul>	
</div>
<div id="login_signup">
@if(!Auth::check())
	<ul>
		<li><a href="/login">LOG IN</a></li>
		<li><a href="/sign_up">SIGN UP</a></li>
	</ul>
@endif
</div>
	 <div id="slideShowImages">
		<img src="../images/pencils/pencils.jpg" alt="Slide 1" />
		<img src="../images/pencils/pencils-features.jpg" alt="Slide 2" />
		<img src="../images/pencils/pencils-text-editor.jpg" alt="Slide 3" />  
		<img src="../images/pencils/pencils-implementation.jpg" alt="Slide 4" />  
	</div>
@stop
