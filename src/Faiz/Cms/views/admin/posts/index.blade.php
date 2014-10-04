@extends('cms::admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="row">
	<div class="col-md-12">
	 <h2>{{ $title }}</h2>   
		<h5>Manage your posts here. </h5>
		<div class="pull-right">
			<a href="{{{ URL::to('admin/blogs/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
		</div>
	</div>
</div>              
<!-- /. ROW  -->

<div class="row">
	<div class="col-md-12">
		{{ HTML::table(array('id', 'post_title', 'post_date'), $items, 'posts') }}
	</div>
</div>
<!-- /. ROW  -->
@stop

