<?php namespace Faiz\Cms\Controllers;

use Illuminate\Support\MessageBag;
use App, View, Redirect, Input, Config, Confide;
use Faiz\Cms\Controllers\BaseController;

class DashboardController extends BaseController {

	/**
	 * Whitelist all the methods we want to allow guests to visit!
	 * @var array
	 */
	protected $whitelist = array(
		'getLogin',
		'getLogout',
		'postLogin'
	);

	/**
	 * Main user page.
	 * @return View 
	 */
	public function getIndex()
	{
		return View::make('cms::dashboard');
	}

	/**
	 * Log the user in
	 * @return Redirect 
	 */
	public function getLogin()
	{
		if (Confide::user()) {
			return Redirect::to($this->urlSegment);
		} else {
			return View::make('cms::users.login');
		}
	}

	/**
	 * Login form processing.
	 * @return Redirect 
	 */
	public function postLogin()
	{
		$repo = App::make('Faiz\Cms\Users\UsersRepository');
		$input = Input::all();

		if ($repo->login($input)) {
			return Redirect::intended($this->urlSegment)
							 ->with('success', new MessageBag(array('You have logged in successfully')));
		} else {
			if ($repo->isThrottled($input)) {
				$err_msg = '';
			} elseif ($repo->existsButNotConfirmed($input)) {
				$err_msg = '';
			} else {
				$err_msg = '';
			}

			return Redirect::action('Faiz\Cms\Controllers\DashboardController@getLogin')
							 ->withInput(Input::except('password'))
							 ->with('errors', new MessageBag(array($err_msg)));
		}
	}

	/**
	 * Log user out.
	 * @return Redirect 
	 */
	public function getLogout()
	{
		Confide::logout();

		return Redirect::to('/users/login')
						 ->with('success', new MessageBag(array('Successfully logged out.')));
	}
}