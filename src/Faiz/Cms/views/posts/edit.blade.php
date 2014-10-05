@extends('cms::layouts.interface-edit')

@section('title')
    {{ $item->post_title }}
@stop

@section('heading')
	<h1>Edit Post: <small>{{ $item->post_title }}</small></h1>
@stop

@section('form-items')
	
	<div class="form-group">
        {{ Form::label( "post_title" , 'Post Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "post_title" , Input::old( "post_title" , $item->post_title ) , array( 'class'=>'form-control' , 'placeholder'=>'Post Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "post_content" , 'Post Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "post_content" , Input::old( "post_content" , $item->post_content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Post Content' ) ) }}
        </div>
    </div>

@stop