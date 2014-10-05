<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('title')</title>

	<!-- Bootstrap core CSS -->
	@section('css')
		<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bootstrap/css/styles.css') }}">
		<link rel="stylesheet" href="{{ asset('bootstrap/css/jquery.tagsinput.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bootstrap/css/redactor.css') }}">
	@show

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body class="interface">
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			
			<div class="navbar-header">
				
				{{-- The Responsive Menu Button --}}
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				{{-- Home Button --}}
				<a href="{{ url($urlSegment) }}" class="navbar-brand">{{ $app_name }}</a>
			</div>

			{{-- The menu items t the top --}}
			<div class="collapse navbar-collapse">
				@if ($menu_items)
					<ul class="nav navbar-nav">
						@foreach ($menu_items as $url=>$item)
							@if ($item['top'])
								<li class="{{ Request::is("$urlSegment/$url*") ? 'active' : '' }}">
									<a href="{{ url($urlSegment . '/' . $url) }}">{{ $item['name'] }}</a>
								</li>
							@endif
						@endforeach
					</ul>
				@endif
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Hi, {{ ucwords(Confide::user()->username) }}</a></li>
					<li><a href="{{ url('users/logout') }}">Logout</a></li>
				</ul>
			</div><!-- EO .nav-collapse -->

		</div><!-- EO .container -->
	</div><!-- EO .navbar -->

	<div class="container">
		<div class="row">
			
			<div class="col-sm-3">
				@if ($menu_items)
					<div class="list-group">
						@foreach ($menu_items as $url=>$item)
							<a href="{{ url($urlSegment . '/' . $url) }}" class="list-group-item {{ Request::is("$urlSegment/$url*") ? 'active' : '' }}">
								<span class="glyphicon glyphicon-{{ $item['icon'] }}"></span>
								{{ $item['name'] }}
							</a>
						@endforeach
					</div>	
				@endif
			</div><!-- EO .col-sm-3 -->
			
			<div class="col-sm-9">
				@yield('content')
			</div><!-- EO .col-sm-9 -->

		</div><!-- EO .row -->
	</div><!-- EO .container -->

	<div class="container">
		<hr>
		<footer>
			<p>&copy; {{ $app_name }} {{ date('Y') }}</p>
		</footer>
	</div><!-- EO .container -->

	@section('scripts')
		<script src="{{ asset('bootstrap/js/jquery.js') }}"></script>
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('bootstrap/js/jquery.tagsinput.min.js') }}"></script>
		<script src="{{ asset('bootstrap/js/redactor.min.js') }}"></script>
		<script>
		$(document).ready(function() {
			var taggables = $('input[name="tags"]');
			var richText = $('textarea.rich');

			if (taggables.length) {
				$(taggables).tagsinput({});
			}

			if (richText.length) {
				$(richText).redactor();
			}
		});
		</script>
	@show
</body>
</html>