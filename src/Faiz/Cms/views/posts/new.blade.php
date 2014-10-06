@extends('cms::layouts.interface-new')

@section('title')
    New Post
@stop

@section('heading')
	<h1>New Post</small></h1>
@stop

@section('form-items')
    
    {{ Form::hidden("post_author", Confide::user()->id) }}
	
	<div class="form-group">
        {{ Form::label( "post_title" , 'Post Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_title" , null, array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "post_content" , 'Post Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "post_content" , null , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}
        </div>
    </div>

@stop