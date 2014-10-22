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
		@if (Auth::user())| <span class="glyphicon glyphicon-pencil"></span><a href="admin/posts/edit/{{{ $post->id }}}" class="btn btn-link">Edit Post</a> @endif
	</div>
	<p>{{ $post->post_content }}</p>
</article>

<div id="comment" class="well"><a id="comments"></a>
<h4>{{{ $post->comments->count() }}} Comments</h4>

@if($post->comments->count())
<!-- Begin comment List -->
<ul class="media-list">
  {{ dumpComments($post->nestedComments) }}
</ul>
<!-- End comment List -->
@endif
</div>


@stop

{{-- Sidebar --}}
@section('sidebar')
	@include('site.layouts.sidebar')
@stop


