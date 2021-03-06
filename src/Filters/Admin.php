<?php namespace Faiz\Cms\Filters;

use Confide, Redirect, Config, View;

class Admin {
	/**
     * If the user is not logged in then we need to get them outta here.
     * @return mixed
     */
	public function filter()
	{
		if (!Confide::user()) {
			// return View::make('admin.users.login');
			return Redirect::action('Faiz\Cms\Controllers\UserController@login');
		}
	}
}

