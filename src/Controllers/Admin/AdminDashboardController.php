<?php namespace Faiz\Cms\Controllers\Admin;

use View;
use Faiz\Cms\Controllers\Admin\ObjectBaseController;

class AdminDashboardController extends BaseController {
	/**
	 * Dashboard
	 * @return Illuminate\View\View
	 */
	public function getIndex()
	{
		return View::make('admin.layouts.dashboard');
	}
}