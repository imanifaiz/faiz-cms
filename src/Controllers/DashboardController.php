<?php namespace Faiz\Cms\Controllers; 

use View;
use Illuminate\Support\MessageBag;

class DashboardController extends BaseController {

	/**
	 * Main user page.
	 * @return View 
	 */
	public function getIndex()
	{
		return View::make('admin.dashboard');
	}
}