@extends('admin.layouts.default')

{{-- Style --}}
@section('style')
<link rel="stylesheet" href="{{ URL::asset('packages/tinymce/dashicons.css') }}">
<link rel="stylesheet" href="{{ URL::asset('packages/tinymce/editor.css') }}">
@stop

{{-- Content --}}
@section('content')

<div class="row">
	<div class="col-md-12">
	 <h2>Create New Post</h2>   
		<!-- <h5>Welcome John Deo , Love to see you back. </h5> -->
		<div class="pull-right">
			<a href="{{{ URL::to('admin/blogs/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
		</div>
	</div>
</div>              
<!-- /. ROW  -->

	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-meta-data" data-toggle="tab">Meta data</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Edit Blog Form --}}
	<form class="form-horizontal" method="post" action="@if (isset($post)){{ URL::to('admin/blogs/' . $post->id . '/edit') }}@endif" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
				<!-- Post Title -->
				<div class="form-group {{{ $errors->has('title') ? 'error' : '' }}}">
                    <div class="col-md-12">
                        <label class="control-label" for="title">Post Title</label>
						<input class="form-control" type="text" name="title" id="title" value="{{{ Input::old('title', isset($post) ? $post->title : null) }}}" />
						{{{ $errors->first('title', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ post title -->

				<!-- Content -->
				<div class="form-group {{{ $errors->has('content') ? 'has-error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="content">Content</label>
						<textarea class="form-control full-width wysihtml5" id="content" name="content" value="content" rows="10">{{{ Input::old('content', isset($post) ? $post->content : null) }}}</textarea>
						{{{ $errors->first('content', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ content -->
			</div>
			<!-- ./ general tab -->

			<!-- Meta Data tab -->
			<div class="tab-pane" id="tab-meta-data">
				<!-- Meta Title -->
				<div class="form-group {{{ $errors->has('meta-title') ? 'error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="meta-title">Meta Title</label>
						<input class="form-control" type="text" name="meta-title" id="meta-title" value="{{{ Input::old('meta-title', isset($post) ? $post->meta_title : null) }}}" />
						{{{ $errors->first('meta-title', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ meta title -->

				<!-- Meta Description -->
				<div class="form-group {{{ $errors->has('meta-description') ? 'error' : '' }}}">
					<div class="col-md-12 controls">
                        <label class="control-label" for="meta-description">Meta Description</label>
						<input class="form-control" type="text" name="meta-description" id="meta-description" value="{{{ Input::old('meta-description', isset($post) ? $post->meta_description : null) }}}" />
						{{{ $errors->first('meta-description', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ meta description -->

				<!-- Meta Keywords -->
				<div class="form-group {{{ $errors->has('meta-keywords') ? 'error' : '' }}}">
					<div class="col-md-12">
                        <label class="control-label" for="meta-keywords">Meta Keywords</label>
						<input class="form-control" type="text" name="meta-keywords" id="meta-keywords" value="{{{ Input::old('meta-keywords', isset($post) ? $post->meta_keywords : null) }}}" />
						{{{ $errors->first('meta-keywords', '<span class="help-block">:message</span>') }}}
					</div>
				</div>
				<!-- ./ meta keywords -->
			</div>
			<!-- ./ meta data tab -->
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
			<div class="col-md-12">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Update</button>
			</div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop

@section('script')
<script src="{{ URL::asset('packages/tinymce/tinymce.min.js') }}"></script>
<script>
tinymce.init({
	selector: "#content",
	menubar: false,
	plugins: ["code", "preview", "hr", "fullscreen", "charmap", 
			  "table", "wordcount", "link", "paste", "textcolor"],
	toolbar: ["bold italic strikethrough bullist numlist table blockquote hr alignleft aligncenter alignright alignjustify link unlink | fullscreen",
			  "formatselect underline forecolor backcolor paste removeformat charmap undo redo outdent indent | code preview"] 
});
</script>

<script src="{{ URL::asset('packages/tinymce/plugins/code/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/preview/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/hr/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/fullscreen/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/table/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/wordcount/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/link/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/textcolor/plugin.min.js') }}"></script>
<script src="{{ URL::asset('packages/tinymce/plugins/paste/plugin.min.js') }}"></script>
@stop
