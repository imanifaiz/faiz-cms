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
			// return View::make('admin.users.login');
			return Redirect::action('UsersController@login');
		}
	}
}

