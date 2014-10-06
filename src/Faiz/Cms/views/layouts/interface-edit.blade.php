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

		<div class="text-right">
			<button class="btn btn-large btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" data-url="{{ $delete_url . $item->id }}"><i class="glyphicon glyphicon-remove"></i> Delete</button>

			{{ Form::submit('Save Items', array('class' => 'btn btn-large btn-success')) }}
		</div>
	{{ Form::close() }}
@stop

@section('scripts')
	@parent
	@include('cms::partials.delete-modal')
@stop