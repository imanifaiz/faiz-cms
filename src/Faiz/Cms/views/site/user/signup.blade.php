@extends('cms::site.layouts.default')

{{-- Content --}}
@section('content')
{{ Confide::makeSignupForm() }}

@stop