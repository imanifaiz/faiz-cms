<?php namespace Faiz\Cms\Controllers;

use Faiz\Cms\Posts\PostsInterface;
use Illuminate\Support\MessageBag;
use Faiz\Cms\Controllers\ObjectBaseController;

class PostsController extends ObjectBaseController {
	/**
     * The place to find the views / URL keys for this controller
     * @var string
     */
	protected $view_key = 'posts';

	/**
	 * Initializer
	 * @param Posts $posts
	 */
	public function __construct(PostsInterface $posts)
	{
		$this->model = $posts;

		parent::__construct();
	}

	/**
     * The method to handle the posted data
     * @param  integer $id The ID of the object
     * @return Redirect
     */
	public function postEdit($id) 
	{
		$record = $this->model->requiredById($id);

		$record->fill(Input::all());

		if (!$record->isValid()) {
			return Redirect::to($this->edit_url . $id)->with('errors', $record->getErrors());
		}

		// Run the hydration method that populates anything else that is required / runs any other
        // model interactions and save it.
		$record->hydrateRelations()->save();

		return Redirect::to($this->object_url)->with('success', new MessageBag(array('Item saved')));
	}
}