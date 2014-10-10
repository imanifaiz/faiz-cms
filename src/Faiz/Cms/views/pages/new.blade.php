@extends('cms::layouts.interface-new')

@section('title')
    New Page
@stop

@section('heading')
	<h1>New Page</h1>
@stop

@section('form-items')
	
	<div class="form-group">
        {{ Form::label( "title" , 'Page Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , null , array( 'class'=>'form-control' , 'placeholder'=>'Page Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "key" , 'Page Key' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "key" , null , array( 'class'=>'form-control' , 'placeholder'=>'Page Key' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "content" , 'Page Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "content" , null , array( 'class'=>'form-control rich' , 'placeholder'=>'Page Content' ) ) }}
        </div>
    </div>

@stop