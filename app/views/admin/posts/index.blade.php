@extends('admin.layouts.interface')

@section('title')
	Manage Posts
@stop

@section('content')

	<h1>Manage Posts</h1>
	<p>Posts can be anything from blog posts, news items to event listings. Essentially they're a timestamp ordered list of content entries with images.</p>

	{{-- The error / success notification message --}}
	@include('admin.partials.notifications')

	@if (!$items->isEmpty())
		{{ HTML::table(array('id', 'post_title', 'created_at'), $items, array('ID', 'Title', 'Published Date'), 'posts', true, true, false) }} 
	@else
		<div class="alert alert-info">
			<strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
		</div>
	@endif
	<a href="{{ $new_url }}" class="btn btn-info pull-right">New Item</a>
	@include('admin.partials.delete-modal')
	
@stop

