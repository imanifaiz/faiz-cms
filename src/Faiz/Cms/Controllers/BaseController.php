<?php namespace Faiz\Cms\Controllers;

use View;
use Config;
use Controller;

abstract class BaseController extends Controller {
	/**
	 * Liat of all the views that dont need the filters
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
    	$this->urlSegment = Config::get('cms::cms.access_url');

    	// Setup composed view and the variables that they required
        $this->beforeFilter('adminFilter', array('except' => $this->whitelist));

        $composed_views = array('cms::*');

        View::composer($composed_views, 'Faiz\Cms\Composers\Page');
    }

}