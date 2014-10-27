<?php namespace Faiz\Cms\Controllers\Admin;

use View;
use Faiz\Cms\Controllers\Admin\ObjectBaseController;
use Illuminate\Support\MessageBag;
use Faiz\Cms\Post\PostInterface;

class AdminPagesController extends ObjectBaseController {
	/**
     * The place to find the views / URL keys for this controller
     * @var string
     */
	protected $view_key = 'pages';

	/**
	 * Initializer
	 * @param Post $post
	 */
	public function __construct(PostInterface $posts)
	{
		$this->model = $post;

		parent::__construct();
	}

	public function getIndex()
	{
		$title = 'Pages Management';

		return View::make('admin.' . $this->view_key . '.index')
					 ->with('items', $this->model->getAllPages())
					 ->with('title', $title);
	}
}