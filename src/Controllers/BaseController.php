<?php namespace Faiz\Cms\Controllers;

use Controller, Config, View;

abstract class BaseController extends Controller {
	/**
	 * List of all the views that dont need the filters
	 * @var array
	 */
	protected $whitelist = array();

	/**
	 * The url segment use to access the system
	 * @var string
	 */
	protected $urlSegment;

	/**
	 * Initializer.
	 *
	 * @access   public
	 * @return \BaseController
	 */
	public function __construct()
	{
		// Get the url segment
		$this->urlSegment = Config::get('cms.access_url');

		// Setup composed view and the variables that they required
		// $this->beforeFilter('adminFilter', array('except' => $this->whitelist));

		$admin_views = array($this->urlSegment . '.*');

		View::composer($admin_views, 'Faiz\Cms\Composers\AdminPage');
		View::composer('site.*', 'Faiz\Cms\Composers\Page');
		View::composer('site.layouts.sidebar', 'Faiz\Cms\Composers\Sidebar');
	}

}

