@extends('site.layouts.default')

{{--Title --}}
@section('title')
{{ $title }} : : @parent
@stop

{{-- Content --}}
@section('content')

{{-- HTML::table(array('id', 'post_title', 'created_at'), $posts, 'admin/posts'); --}}
{{-- HTML::alert('danger', 'This is alert') --}}

@foreach ($posts as $post)
<article class="blog-post">
	<h2 class="blog-post-title"><a href="{{{ $post->post_slug }}}">{{ String::title($post->post_title) }}</a></h2>
	<div class="blog-post-meta">
		<span class="glyphicon glyphicon-user"></span> by <span class="muted">{{ ucwords($post->author->username) }}</span>
		| <span class="glyphicon glyphicon-calendar"></span>{{{ date("d F Y, h:i a", strtotime($post->created_at)) }}}
		| <span class="glyphicon glyphicon-comment"></span><a href="{{{ $post->post_slug }}}#comments">{{ $post->comments()->count() }} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
	</div>
	<p>{{ String::tidy(Str::limit($post->post_content, 200)) }}<a href="{{{ $post->post_slug }}}" class="btn btn-link">Read more</a></p>
</article>

<hr>
@endforeach

{{ $posts->links() }}

@stop


{{-- Sidebar --}}
@section('sidebar')
	@include('site.layouts.sidebar')
@stop



