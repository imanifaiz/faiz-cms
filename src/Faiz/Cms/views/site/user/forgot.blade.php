@extends('cms::site.layouts.default')

{{-- Content --}}
@section('content')
{{ Confide::makeForgotPasswordForm() }}

@stop