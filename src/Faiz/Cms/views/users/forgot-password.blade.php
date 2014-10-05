@extends('cms::layouts.user-auth')

@section('title')
    Forgot Password
@stop

@section('content')
<div class="col-md-4 col-md-offset-4">
    <div class="well clearfix">
        <form method="POST" class="form" action="http://laravel-1.dev/users/forgot_password" accept-charset="UTF-8">
            @include('cms::partials.notifications')
            
            <h1>Enter your email</h1>
            <input type="hidden" name="_token" value="Q8mWdv0rt5UnMzouhDmg6YICxEcmdTYjqS7yvOn2">
            <div class="form-group">
                <div class="input-append input-group">
                    <input class="form-control" placeholder="Email" type="text" name="email" id="email" value="">
                    <span class="input-group-btn">
                        <input class="btn btn-primary" type="submit" value="Continue">
                    </span>
                </div>
            </div>
        </form>
    </div>
</div>

@stop
