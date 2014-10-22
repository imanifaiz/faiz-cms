@extends('site.layouts.default')

{{--Title --}}
@section('title')
{{ $title }} : : @parent
@stop

{{-- Content --}}
@section('content')

@foreach ($posts as $post)
<article class="blog-post">
	<h2 class="blog-post-title"><a href="{{{ $post->post_slug }}}">{{ String::title($post->post_title) }}</a></h2>
	<div class="blog-post-meta">
		<span class="glyphicon glyphicon-user"></span> by <span class="muted">{{ ucwords($post->author->username) }}</span>
		| <span class="glyphicon glyphicon-calendar"></span>{{{ $post->created_at }}}
		| <span class="glyphicon glyphicon-comment"></span><a href="{{{ $post->post_slug }}}#comments">{{ $post->comments()->count() }} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
		@if (Auth::user())| <span class="glyphicon glyphicon-pencil"></span><a href="admin/posts/edit/{{{ $post->id }}}" class="btn btn-link">Edit Post</a> @endif
	</div>
	<p>{{ $post->post_excerpt }}<a href="{{{ $post->post_slug }}}" class="btn btn-link">Read more</a></p>
</article>

<hr>
@endforeach

{{ $posts->links() }}

@stop


{{-- Sidebar --}}
@section('sidebar')
	@include('site.layouts.sidebar')
@stop



