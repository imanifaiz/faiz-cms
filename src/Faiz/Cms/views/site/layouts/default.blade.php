<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
	@section('title')
	Laravel 4
	@show
	</title>

	<meta name="keywords" content="your, awesome, keywords, here" />
	<meta name="author" content="Jon Doe" />
	<meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('bootstrap/css/blog.css') }}">

	<style>
	/* Sticky footer styles
	-------------------------------------------------- */
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  /* Margin bottom by footer height */
	  margin-bottom: 60px;
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 60px;
	  background-color: #f5f5f5;
	}
	@section('css')
	@show
	</style>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

<div id="wrap">
	<header class="navbar navbar-default navbar-static-top" role="navigation">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{ URL::to('/') }}">Laravel</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<li {{ (Request::is('/') ? 'class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a>
	      </ul>

	      <ul class="nav navbar-nav pull-right">
			
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</header>

	<div class="main-header" id="content">
		<div class="container">
			<h1>Blogs</h1>
			<p>Custom Blogging using Laravel 4</p>
		</div>
	</div>

	<div id="main" class="container">
		@include('cms::notifications')
		<!-- EO notifications -->

		<div class="row">
			<div class="col-md-8 blog-main">
			@yield('content')
			</div>
			<!-- EO blog-main -->

			<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			@yield('sidebar')
			</div>
			<!-- EO sidebar -->
		</div>
	</div>
	<!-- EO main container -->

	<div id="push"></div>
	<!-- EO #push - for sticky footer -->
</div>
<!-- EO #wrap -->

<footer class="footer">
	<div class="container">
		<p class="text-muted">Laravel 4 CMS</p>
	</div>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
@yield('js')
</body>
</html>