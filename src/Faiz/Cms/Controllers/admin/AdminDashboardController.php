<?php

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