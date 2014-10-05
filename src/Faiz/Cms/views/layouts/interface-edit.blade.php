@extends('cms::layouts.interface')

@section('content')

	@yield('heading')

	{{--The menu partial --}}
	@include('cms::partials.edit-menu')

	{{ Form::open(array('url' => $edit_url . $item->id, 'class' => 'form-horizontal form-top-margin',
	'role' => 'form', 'id' => 'item-form')) }}

		{{-- The error / success notification message --}}
		@include('cms::partials.notifications')

		<div class="tab-content">
			<div class="tab-pane active" id="main">
				@yield('form-items')
			</div>
		</div>

		{{ Form::submit('Save Items', array('class' => 'btn btn-large btn-primary pull-right')) }}

	{{ Form::close() }}
@stop