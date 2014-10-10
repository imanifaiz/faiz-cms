@extends('cms::layouts.interface')

@section('title')
	Manage Pages
@stop

@section('content')

	<h1>Manage Pages</h1>
	<p>Pages are 'blocks' of information. Pages are identified by their unique keys so if you have some pages that are already working for you, don't change the keys or you're going to have a bad time.</p>

	{{-- The error / success notification message --}}
	@include('cms::partials.notifications')

	@if (!$items->isEmpty())
		{{ HTML::table(array('id', 'title', 'key', 'created_at'), $items, array('ID', 'Title', 'Key', 'Created Date'), 'pages', true, true, false) }} 
	@else
		<div class="alert alert-info">
			<strong>No Items Yet:</strong> You don't have any items here just yet. Add one using the button below.
		</div>
	@endif
	<a href="{{ $new_url }}" class="btn btn-primary pull-right">New Item</a>
	@include('cms::partials.delete-modal')
	
@stop

