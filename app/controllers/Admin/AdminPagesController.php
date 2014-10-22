<?php

use Illuminate\Support\MessageBag;
use Faiz\Cms\Posts\PostsInterface;

class AdminPagesController extends ObjectBaseController {
	/**
     * The place to find the views / URL keys for this controller
     * @var string
     */
	protected $view_key = 'pages';

	/**
	 * Initializer
	 * @param Posts $posts
	 */
	public function __construct(PostsInterface $posts)
	{
		$this->model = $posts;

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