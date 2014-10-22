@extends('admin.layouts.interface-new')

@section('title')
    New Post
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="{{ asset('lib/selectize/css/selectize.bootstrap3.css') }}">
	<style>
		.selectize-control.multi .selectize-input > div {
		background: #E3DCEE;
		color: #333333;
		}
		.selectize-control.multi .selectize-input > div.active {
		background: #5D4384;
		}
	</style>
@stop

@section('heading')
	<h1>New Post</small></h1>
@stop

@section('form-items')
    
    {{ Form::hidden("post_author", Confide::user()->id) }}

    {{ Form::hidden("post_type", 'post') }}
	
	{{-- Post Title --}}
	<div class="form-group">
        {{ Form::label( "post_title" , 'Post Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_title" , null, array( 'id' => 'title', 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
        </div>
    </div>

    {{-- Post Slug --}}
    <div class="form-group">
        {{ Form::label( "post_slug" , 'Post Slug' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_slug" , null, array( 'id' => 'slug', 'class'=>'form-control' , 'placeholder'=>'Post Slug' ) ) }}
        </div>
    </div>

    {{-- Post Tags --}}
    <div class="form-group">
        {{ Form::label( "post_tags" , 'Post Tags' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_tags" , null, array( 'id' => 'tags', 'class'=>'form-control' , 'placeholder'=>'Post Tags' ) ) }}
        </div>
    </div>

    {{-- Post Content --}}
    <div class="form-group">
        {{ Form::label( "post_content" , 'Post Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "post_content" , null , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}
        </div>
    </div>

@stop

@section('scripts')
	@parent
	<script src="{{ asset('lib/jquery.slugit/jquery.slugit.js') }}"></script>
	<script src="{{ asset('lib/selectize/js/standalone/selectize.min.js') }}"></script>
	<script>
		$( document ).ready( function() {
			// jquery slugit
			$( '#title' ).slugIt();

			// jquery slectize
			$('#tags').selectize({
			    plugins: ['remove_button'],
			    delimiter: ',',
			    persist: false,
			    create: function(input) {
			        return {
			            value: input,
			            text: input
			        }
			    }
			});
		});
	</script>
@stop