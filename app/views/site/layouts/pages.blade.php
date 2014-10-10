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
	<h2 class="blog-post-title">{{ $page->title }}</h2>
	<p>{{ $page->content }}</p>
</article>

@stop

{{-- Sidebar --}}
@section('sidebar')
	@include('site.layouts.sidebar')
@stop


