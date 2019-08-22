<!DOCTYPE HTML>
<html>
<head>
@yield('title')
<link href="{{asset('/')}}front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="{{asset('/')}}front/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Archive Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('/')}}front/css/flexslider.css" type="text/css" media="screen" />
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
<script src="{{asset('/')}}front/js/jquery.min.js"></script>
</head>
<body>

<style>

/* Dropdown Button */
.dropbtn {
  background-color: #ebebeb;
  color: #888888;
  padding: 10px;
  font-size: 12px;
  
}

/* The container <div> - needed to position the dropdown content */
.dropdown1 {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown1-content1 {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown1-content1 a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown1-content1 a:hover {background-color: #ebebeb;}

/* Show the dropdown menu on hover */
.dropdown1:hover .dropdown1-content1 {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown1:hover .dropbtn {background-color: #ebebeb;}
</style>


<!-- header -->
	<div class="content-main">

		<div class="container">

			<div class="col-md-3 top-left">
				@guest
				<div>
					<a href="{{route('login')}}"><strong>Sign In</strong></a>
				</div>
				@if(Route::has('register'))
				
				@endif
				@else
				
				<div class="dropdown1"  style="padding:5px">
  						<img src="{{asset('/')}}front/images/user.png" height="12px" width="12px"/><strong style="padding-left:3px">{{Auth::user()->name}}</strong>
  						<?php Session::put('user_id',Auth::user()->id)?>
  					<div class="dropdown1-content1">
    					<a href="{{route('Dashboard')}}">DashBoard</a>
    					<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										 SignOut
									</a>

									<form id="logout-form" action="{{ route('logout') }}"
										method="POST" style="display: none;">@csrf</form>
 					 </div>
				</div>
				<br>
				@endguest
				<div class="logo">
					<a href="{{route('index')}}"><h1>ReadBooks</h1></a>
				</div>
				<h4 class="menn">Menu</h4>
				<label></label>
				<div class="head-nav">
					<span class="menu"> </span>
						<ul>
							<li><a href="{{route('index')}}">Home</a></li>
							<li><a href="{{route('aboutUs')}}">About</a></li>
							<li><a href="{{route('Viewblogs')}}">Blog</a></li>
							<li><a href="{{route('contactUs')}}">Contact</a></li>
					
								<div class="clearfix"> </div>
						</ul>
						<!-- script-for-nav -->
					<script>
						$( "span.menu" ).click(function() {
						  $( ".head-nav ul" ).slideToggle(300, function() {
							// Animation complete.
						  });
						});
					</script>
				<!-- script-for-nav --> 	
				</div>
				<div class="clearfix"> </div>
				<div class="project">
					<h4>Books</h4>
					<label></label>
					
					<ul>
					
					{{ Form::open(['route'=>'search', 'method'=>'POST','class'=>'form-horizontal'])}}
				
						<li><input type="text" name="BookName" placeholder="search"></li>
						
						@if($errors->has('BookName'))
							<span class="text text-danger">can't be empty</span>
						@endif
					{{ Form::close() }}
					
					@foreach($catagories as $catagory)
						<li><a href="{{route('BooksCatagoryView',['id'=>$catagory->id,'name'=>$catagory->name])}}">{{$catagory->name}}</a></li>
				    @endforeach
					</ul>
				</div>
			</div>
			@yield('content')
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<?php 
			     $info = getdate();
			     $year = $info['year'];
			?>
		<p>
			© {{$year}}, All Rights Reserved by ReadBooks.
		</p>
		</div>
	</div>
	<!-- footer -->
</html>
</body>
