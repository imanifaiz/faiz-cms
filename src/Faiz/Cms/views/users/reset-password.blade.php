@extends('cms::layouts.user-auth')

@section('title')
    Enter New Password
@stop

@section('content')
<div class="col-md-4 col-md-offset-4">
    @include('cms::partials.notifications')
    
    <div class="well clearfix">
        <form method="POST" class="form" action="http://laravel-1.dev/users/reset_password" accept-charset="UTF-8">
            <h1>New Password</h1>
            <input type="hidden" name="token" value="14ff5aa68b51c0e6fe2218783762a03b">
            <input type="hidden" name="_token" value="Q8mWdv0rt5UnMzouhDmg6YICxEcmdTYjqS7yvOn2">

                
                <div class="form-group">
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
                </div>
            <div class="form-actions form-group">
                <button type="submit" class="btn btn-primary btn-block">Continue</button>
            </div>
        </form>
    </div>
</div>
@stop