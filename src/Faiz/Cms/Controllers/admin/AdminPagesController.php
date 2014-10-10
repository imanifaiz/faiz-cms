<?php namespace Faiz\Cms\Controllers\admin;

use Illuminate\Support\MessageBag;
use Faiz\Cms\Controllers\ObjectBaseController;
use Faiz\Cms\Pages\PagesInterface;
use View;

class AdminPagesController extends ObjectBaseController {
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

		parent::__construct();
	}

	public function getIndex()
	{
		$title = 'Pages Management';

		return View::make('cms::' . $this->view_key . '.index')
					 ->with('items', $this->model->getAll())
					 ->with('title', $title);
	}
}