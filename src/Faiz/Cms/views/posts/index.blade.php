@extends('cms::layouts.interface')

@section('title')
	Manage Posts
@stop

@section('content')

	<h1>Manage Posts</h1>
	<p>Posts can be anything from blog posts, news items to event listings. Essentially they're a timestamp ordered list of content entries with images.</p>

	{{-- The error / success notification message --}}
	@include('cms::partials.notifications')

	@if (!$items->isEmpty())
		{{ HTML::table(array('id', 'post_title', 'post_date'), $items, 'posts', true, true, false) }} 
	@else
		<div class="alert alert-info">
			<strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
		</div>
	@endif
	<a href="{{ $new_url }}" class="btn btn-primary pull-right">New Item</a>
@stop