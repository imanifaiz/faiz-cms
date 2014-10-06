@extends('site.layouts.default')

{{-- Title --}}
@Section('title')
{{{ String::title($title) }}} : :
@parent
@stop

{{-- Update the Meta Title --}}
@section('meta_title')
@parent
@stop

{{-- Update the Meta Description --}}
@section('meta_description')
@parent
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
@parent
@stop

{{-- Content --}}
@section('content')
<article class="blog-post">
	<h2 class="blog-post-title">{{ $post->post_title }}</h2>
	<div class="blog-post-meta">
		<span class="glyphicon glyphicon-user"></span> by <span class="muted">{{{ $post->author->username }}}</span>
		| <span class="glyphicon glyphicon-calendar"></span>{{{ date("d F Y, h:i a", strtotime($post->created_at)) }}}
	</div>
	<p>{{ $post->post_content }}</p>
</article>

<div class="well"><a id="comments"></a>
<h4>{{{ $post->comments->count() }}} Comments</h4>

@if ($post->comments->count())
@foreach ($post->comments as $comment)
<div class="row">
	<div class="col-md-2">
		<img class="thumbnail" src="http://placehold.it/60x60" alt="">
	</div>
	<div class="col-md-10">
		<div class="row">
			<div class="col-md-10">
				<span class="muted">{{{ $comment->comment_author }}}</span>
				&bull;
				{{{ $comment->comment_date }}}
			</div>

			<div class="col-md-10">
				{{{ $comment->comment_content }}}
			</div>
		</div>
	</div>
</div>
<hr />
@endforeach
@else
<hr />
@endif</div>


@stop

{{-- Sidebar --}}
@section('sidebar')
	@include('site.layouts.sidebar')
@stop


