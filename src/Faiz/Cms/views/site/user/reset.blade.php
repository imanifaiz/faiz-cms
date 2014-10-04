@extends('cms::site.layouts.default')

{{-- Content --}}
@section('content')
{{ Confide::makePasswordResetForm() }}

@stop