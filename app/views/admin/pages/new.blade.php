@extends('admin.layouts.interface-new')

@section('title')
    New Page
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
	<h1>New Page</small></h1>
@stop

@section('form-items')
    
    {{ Form::hidden("post_author", Confide::user()->id) }}

    {{ Form::hidden("post_type", 'page') }}
	
	{{-- Page Title --}}
	<div class="form-group">
        {{ Form::label( "post_title" , 'Page Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_title" , null, array( 'id' => 'title', 'class'=>'form-control' , 'placeholder'=>'Page Title' ) ) }}
        </div>
    </div>

    {{-- Page Slug --}}
    <div class="form-group">
        {{ Form::label( "post_slug" , 'Page Slug' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_slug" , null, array( 'id' => 'slug', 'class'=>'form-control' , 'placeholder'=>'Page Slug' ) ) }}
        </div>
    </div>

    {{-- Page Tags --}}
    <div class="form-group">
        {{ Form::label( "post_tags" , 'Page Tags' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_tags" , null, array( 'id' => 'tags', 'class'=>'form-control' , 'placeholder'=>'Page Tags' ) ) }}
        </div>
    </div>

    {{-- Page Content --}}
    <div class="form-group">
        {{ Form::label( "post_content" , 'Page Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "post_content" , null , array( 'class'=>'form-control rich' , 'placeholder'=>'Page Content' ) ) }}
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