@extends('templates.default')

@section('content')
	<h3><center>Welcome to AState Message Forum</center></h3>
	<!-- <p>The best social network, like... ever.</p> -->
<p style="text-align: left;">This message forum web application allow users to view posts in a forum with information such as the post title, post date, posted by [user], etc. The user should be able to see all the posts that are posted in the forum and view the details as well as the comments that are in the post.</p>
	 @if (!Auth::check())
	<html>
		<head>
		    
		    <link href="/images/styles.css" type="text/css" rel="stylesheet">
		</head>
	<body>
	    <div class="slider-holder">
	        <span id="slider-image-1"></span>
	        <span id="slider-image-2"></span>
	        <span id="slider-image-3"></span>
	        <div class="image-holder">
	            <img src="/images/B1.jpg" class="slider-image" />
	            <img src="/images/B2.jpg" class="slider-image" />
	            <img src="/images/B5.jpg" class="slider-image" />
	                    
	        </div>
	        <div class="button-holder">
	            <a href="#slider-image-1" class="slider-change"></a>
	            <a href="#slider-image-2" class="slider-change"></a>
	            <a href="#slider-image-3" class="slider-change"></a>
	        </div>
	    </div>
	</body>
</html>
@endif
	
@stop