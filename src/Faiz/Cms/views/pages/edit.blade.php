@extends('cms::layouts.interface-edit')

@section('title')
    {{ $item->title }}
@stop

@section('heading')
	<h1>Edit Page: <small>{{ $item->title }}</small></h1>
@stop

@section('form-items')
	
	<div class="form-group">
        {{ Form::label( "title" , 'Page Title' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "title" , Input::old( "title" , $item->title ) , array( 'class'=>'form-control' , 'placeholder'=>'Page Title' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "key" , 'Page Key' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::text( "key" , Input::old( "key" , $item->key ) , array( 'class'=>'form-control' , 'placeholder'=>'Page Key' ) ) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label( "content" , 'Page Content' , array( 'class'=>'col-lg-2 control-label' ) ) }}
        <div class="col-lg-10">
            {{ Form::textarea( "content" , Input::old( "content" , $item->content ) , array( 'class'=>'form-control rich' , 'placeholder'=>'Page Content' ) ) }}
        </div>
    </div>

@stop