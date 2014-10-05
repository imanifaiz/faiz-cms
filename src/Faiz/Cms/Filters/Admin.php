<?php namespace Faiz\Cms\Filters;

use Auth, Redirect, Config, View;

class Admin {
	/**
     * If the user is not logged in then we need to get them outta here.
     * @return mixed
     */
	public function filter()
	{
		if (Auth::guest()) {
			// return Redirect::guest('users/login');
			// return View::make('cms::users.login');
			return View::make('cms::users.login');
			// return Redirect::action('Faiz\Cms\Controllers\UsersController@login');
		}
	}
}

