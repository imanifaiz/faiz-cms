@extends('cms::site.layouts.default')

{{--Title --}}
@section('title')
{{ $title }} :: @parent
@stop

{{-- Content --}}
@section('content')

{{-- HTML::table(array('id', 'post_title', 'post_date'), $posts, 'admin/posts'); --}}
{{-- HTML::alert('danger', 'This is alert') --}}

@foreach ($posts as $post)
<article class="blog-post">
	<h2 class="blog-post-title"><a href="{{{ $post->post_slug }}}">{{ String::title($post->post_title) }}</a></h2>
	<div class="blog-post-meta">
		<span class="glyphicon glyphicon-user"></span> by <span class="muted">{{{ $post->post_author }}}</span>
		| <span class="glyphicon glyphicon-calendar"></span>{{{ date("d F Y, h:i a", strtotime($post->post_date)) }}}
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
	@include('cms::site.layouts.sidebar')
@stop



