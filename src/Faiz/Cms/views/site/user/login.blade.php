@extends('cms::site.layouts.default')

{{-- Content --}}
@section('content')
{{ Confide::makeLoginForm() }}

@stop
