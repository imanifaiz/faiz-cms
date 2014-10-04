<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
	@section('title')
	Administration
	@show
	</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="{{ URL::asset('bs-binary-admin/assets/css/bootstrap.css') }}" rel="stylesheet" />
	 <!-- FONTAWESOME STYLES-->
	<link href="{{ URL::asset('bs-binary-admin/assets/css/font-awesome.css') }}" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
	<link href="{{ URL::asset('bs-binary-admin/assets/css/custom.css') }}" rel="stylesheet" />
	 <!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	@yield('style')
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ URL::to('') }}">Binary admin</a> 
			</div>
			<div style="color: white;
			padding: 8px 20px;
			float: right;"> Last access : 30 May 2014 &nbsp; 
			<a href="{{ URL::to('/users/logout') }}" class="btn btn-danger square-btn-adjust">Logout</a> </div>
		</nav>   
		   <!-- /. NAV TOP  -->

		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
				<li class="text-center">
					<img src="{{ URL::asset('bs-binary-admin/assets/img/find_user.png') }}" class="user-image img-responsive"/>
					</li>
					
					<li>
						<a href="{{ URL::to(Config::get('cms::cms.access_url')) }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
					</li>
					 <li>
						<a  href="{{ URL::to(Config::get('cms::cms.access_url') . '/posts') }}" {{ (Request::is('admin/posts*') ? 'class="active-menu"' : '') }}><i class="fa fa-desktop fa-3x"></i>Posts</a>
					</li>
					<li>
						<a  href="{{ URL::to(Config::get('cms::cms.access_url') . '/media') }}" {{ (Request::is('admin/media*') ? 'class="active-menu"' : '') }}><i class="fa fa-qrcode fa-3x"></i>Media</a>
					</li>
						   <li  >
						<a   href="{{ URL::to(Config::get('cms::cms.access_url') . '/pages') }}" {{ (Request::is('admin/pages*') ? 'class="active-menu"' : '') }}><i class="fa fa-bar-chart-o fa-3x"></i>Pages</a>
					</li>	
					  <li  >
						<a  href="{{ URL::to(Config::get('cms::cms.access_url') . '/comments') }}" {{ (Request::is('admin/comments*') ? 'class="active-menu"' : '') }}><i class="fa fa-table fa-3x"></i>Comments</a>
					</li>
					<li  >
						<a  href="{{ URL::to(Config::get('cms::cms.access_url') . '/users') }}" {{ (Request::is('admin/users*') ? 'class="active-menu"' : '') }}><i class="fa fa-edit fa-3x"></i>Users</a>
					</li>				
					
									   
					<li>
						<a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li>
								<a href="#">Second Level Link</a>
							</li>
							<li>
								<a href="#">Second Level Link</a>
							</li>
							<li>
								<a href="#">Second Level Link<span class="fa arrow"></span></a>
								<ul class="nav nav-third-level">
									<li>
										<a href="#">Third Level Link</a>
									</li>
									<li>
										<a href="#">Third Level Link</a>
									</li>
									<li>
										<a href="#">Third Level Link</a>
									</li>

								</ul>
							   
							</li>
						</ul>
					  </li>  
				  <li  >
						<a  href="{{ URL::to(Config::get('cms::cms.access_url') . '/settings') }}" {{ (Request::is('admin/settings*') ? 'class="active-menu"' : '') }}><i class="fa fa-square-o fa-3x"></i>Settings</a>
					</li>	
				</ul>
			   
			</div>	
		</nav>  
		<!-- /. NAV SIDE  -->

		<div id="page-wrapper" >
			<div id="page-inner">
				
				@yield('content')

				<hr />                
			</div>
			<!-- /. PAGE INNER  -->
		</div>
		<!-- /. PAGE WRAPPER  -->
	</div>
	<!-- /. WRAPPER  -->

	<!-- JQUERY SCRIPTS -->
	<script src="{{ URL::asset('bs-binary-admin/assets/js/jquery-1.10.2.js') }}"></script>
	  <!-- BOOTSTRAP SCRIPTS -->
	<script src="{{ URL::asset('bs-binary-admin/assets/js/bootstrap.min.js') }}"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="{{ URL::asset('bs-binary-admin/assets/js/jquery.metisMenu.js') }}"></script>
	 <!-- MORRIS CHART SCRIPTS -->
	 <script src="{{ URL::asset('bs-binary-admin/assets/js/morris/raphael-2.1.0.min.js') }}"></script>
	 <script src="{{ URL::asset('bs-binary-admin/assets/js/morris/morris.js') }}"></script>
	  <!-- CUSTOM SCRIPTS -->
	 <script src="{{ URL::asset('bs-binary-admin/assets/js/custom.js') }}"></script>

	@yield('script')
	
</body>
</html>
