@extends('site.layouts.default')

{{--Title --}}
@section('title')
{{ $title }} : : @parent
@stop

{{-- Main Header --}}
@section('main-header')
	<h1>Galleries</h1>
	<p>Manage your galleries here.</p>
@stop

{{-- Content --}}
@section('content')

{{ Form::open(array('url' => 'media/delete')) }}

	@foreach ($images as $image)

		<div class="col-xs-6 col-md-3">
			<a href="{{ $image['image'] }}" class="thumbnail">
				<img src="{{ $image['thumb'] }}" alt="{{ $image['title'] }}">
				<div class="caption">
					<h3>{{ $image['title'] }}</h3>
				</div>
				{{ Form::checkbox('image[]', $image['link'], false) }}
			</a>
		</div>

	@endforeach

	{{ Form::submit() }}
{{ Form::close() }}

@stop


{{-- Sidebar --}}
@section('sidebar')
	@include('site.layouts.sidebar')
@stop



