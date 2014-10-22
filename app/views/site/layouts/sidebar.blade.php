<div class="sidebar-module sidebar-module-inset text-center">
	<img data-src="holder.js/150x150/auto/#d9534f:#fff/text:About Me" class="img-circle" alt="150x150"style="margin-bottom:40px">
	<h4>About</h4>
	<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
</div>

<div class="sidebar-module">
	<h4>Archives</h4>
		<ol class="list-unstyled">
			@foreach ($archives as $archive)
				<li><a href="{{ URL::to('/archives', [$archive->archive_date]) }}">{{ $archive->archive_date }}</a></li>
			@endforeach
	</ol>
</div>

<div class="sidebar-module">
	<h4>Elsewhere</h4>
	<ol class="list-unstyled">
		<li><a href="#">GitHub</a></li>
		<li><a href="#">Twitter</a></li>
		<li><a href="#">Facebook</a></li>
	</ol>
</div>

@section('js')
<script src="{{ URL::asset('bootstrap/js/holder.js') }}"></script>
@stop