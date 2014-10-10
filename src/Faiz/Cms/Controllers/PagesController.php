<?php namespace Faiz\Cms\Controllers;

use Illuminate\Support\MessageBag;
use Faiz\Cms\Controllers\ObjectBaseController;
use Faiz\Cms\Pages\PagesInterface;

class PagesController extends ObjectBaseController {
	/**
     * The place to find the views / URL keys for this controller
     * @var string
     */
	protected $view_key = 'pages';

	/**
	 * Initializer
	 * @param Pages $pages
	 */
	public function __construct(PagesInterface $pages)
	{
		$this->model = $pages;
	}
}