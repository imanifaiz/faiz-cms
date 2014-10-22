@extends('admin.layouts.interface')

@section('content')

	@yield('heading')

	{{--The menu partial --}}
	@include('admin.partials.edit-menu')

	{{ Form::open(array('url' => $edit_url . $item->id, 'class' => 'form-horizontal form-top-margin',
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
			<a class="btn btn-large btn-danger" data-toggle="modal" data-target="#confirmDelete" data-title="Confirm Delete" data-message="Are you sure you want to delete this?" data-url="{{ $delete_url . $item->id }}"><i class="glyphicon glyphicon-remove" url="#"></i> Delete</a>

			{{ Form::submit('Save Items', array('class' => 'btn btn-large btn-info')) }}
		</div>
	{{ Form::close() }}
@stop

@section('scripts')
	@parent
	@include('admin.partials.delete-modal')
@stop