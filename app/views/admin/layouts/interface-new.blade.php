@extends('admin.layouts.interface')

@section('content')

	@yield('heading')

	{{--The menu partial --}}
	@include('admin.partials.edit-menu')

	{{ Form::open(array('url' => $new_url, 'class' => 'form-horizontal form-top-margin',
	'role' => 'form', 'id' => 'item-form')) }}

		{{-- The error / success notification message --}}
		@include('admin.partials.notifications')

		<div class="tab-content">
			<div class="tab-pane active" id="main">
				@yield('form-items')
			</div>
		</div>
		
		<div class="text-right">
			<a href="javascript:window.history.back(-1)" class="btn btn-default">Cancel</a>

			{{ Form::submit('Save Items', array('class' => 'btn btn-large btn-info')) }}
		</div>

	{{ Form::close() }}
@stop