@extends('admin.layouts.user-auth')

@section('title')
    Signup
@stop

@section('content')
<div class="col-md-4 col-md-offset-4">
    @include('admin.partials.notifications')
    
    <div class="well">
        <form method="POST" action="http://laravel-1.dev/users" accept-charset="UTF-8">
            <h1 class="text-center">Signup</h1>
            <input type="hidden" name="_token" value="Q8mWdv0rt5UnMzouhDmg6YICxEcmdTYjqS7yvOn2">
            <fieldset>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" placeholder="Username" type="text" name="username" id="username" value="">
                </div>
                <div class="form-group">
                    <label for="email">Email <small>(Confirmation required)</small></label>
                    <input class="form-control" placeholder="Email" type="text" name="email" id="email" value="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" placeholder="Password" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="password_confirmation" id="password_confirmation">
                </div>

                
                
                <div class="form-actions form-group">
                  <button type="submit" class="btn btn-primary btn-block">Create new account</button>
                </div>

            </fieldset>
        </form>
    </div>
</div>
@stop
