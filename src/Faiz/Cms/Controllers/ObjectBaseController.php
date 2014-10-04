<?php namespace Faiz\Cms\Controllers;

use App;
use View;
use Redirect;
use Faiz\Cms\Controllers\BaseController;
use Illuminate\Support\MessageBag;
use Faiz\Cms\Core\Exceptions\EntityNotFoundException;

abstract class ObjectBaseController extends BaseController {
	/**
	 * The model to work with editing stuff
	 * @var Model
	 */
	protected $model;

	/**
	 * The place to find some standardised views
	 * @var string
	 */
	protected $view_key;

	/**
	 * The URL to gte the root of this object
	 * @var string
	 */
	protected $object_url;

	/**
	 * The URL used for editing
	 * @var string
	 */
	protected $edit_url;

	/**
	 * The URL to create new entry
	 * @var string
	 */
	protected $new_url;

	/**
	 * The URL to delete entry
	 * @var string
	 */
	protected $delete_url;

	/**
	 * Is the controller allowed to upload images?
	 * @var boolean
	 */
	protected $uploadable;

	/**
	 * Is the controller allowed to have tags?
	 * @var boolean
	 */
	protected $taggable;

	/**
	 * Can items be deleted?
	 * @var boolean
	 */
	protected $deletable = true;

	/**
	 * The uploads model
	 * @var UploadsInterface
	 */
	protected $uploads_model;

	/**
     * By default a mass assignment is used to validate things on a model
     * Sometimes you want to confirm inputs (such as password confirmations)
     * that you don't want to be necessarily stored on the model. This will validate
     * inputs from Input::all() not from $model->fill();
     * @var boolean
     */
	protected $validateWithInput = false;

	/**
	 * Initializer
	 */
	public function __construct()
	{
		parent::__construct();

		// $this->uploads_model = App::make('Faiz\Cms\Uploads\UploadsInterface');

		$this->setHandyUrls();
		$this->shareHandyUrls();
		$this->setTraitableProperties();
		$this->setViewObjectAbilities();
	}

	/**
	 * Index page
	 * @return View 
	 */
	public function getIndex()
	{
		return View::make('cms::' . $this->view_key . '.index')
					 ->with('items', $this->model->getAll());
	}

	/**
	 * Create new object
	 * @return View
	 */
	public function getNew()
	{
		if (!View::exists('cms::' . $this->view_key . '.new')) {
			return App::abort(404, 'Page not found');
		}

		return View::make('cms::' . $this->view_key . '.new');
	}

	/**
	 * Edit record
	 * @param  Integer $id The record ID
	 * @return View    
	 */
	public function getEdit($id)
	{
		try {
			$item = $this->model->requiredById($id);
		} catch (EntityNotFoundException $e) {
			return Redirect::to($this->object_url)
							 ->with('errors', new MessageBag(array("An item with the ID:$id could not be found.")));
		}

		if (!View::exists('cms::' . $this->view_key . '.edit')) {
			return App::abort(404, 'Page not found');
		}

		return View::make('cms::' . $this->view_key . '.edit')
					 ->with('item', $item);
	}

	/**
	 * Delete object based on ID passed in
	 * @param  Integer $id The record ID
	 * @return Redirect     
	 */
	public function getDelete($id)
	{
		if ($this->deletable == false) {
			return App::abort(404, 'Page not found');
		}

		$model = $this->model->getById($id);

		$model->delete();

		$message = 'The item was sucessfully deleted.';

		return Redirect::to($this->object_url)
						 ->with('success', new MessageBag(array($message)));
	}

	/**
	 * The new object method, very generic, just allow
	 * mass assignable stuff to be filled and saved
	 * @return Redirect 
	 */
	public function postNew()
	{
		$record = $this->model->getNew(Input::all());

		$valid = $this->validateWithInput === true ? $record->isValid(Input::all()) : $record->isValid();

		if (!valid) {
			return Redirect::to($this->new_url)->with('errors', $record->getErrors())->withInput();
		}

		// Run the hydration method that populates anything else that is required / runs any other
		// model interactions and save it.
		$record->save();

		return Redirect::to($this->object_url)->with('success', new MessageBag(array('Item created')));
	}

	/**
	 * Handle posted data
	 * @param  Integer $id The ID of the object
	 * @return Redirect     
	 */
	public function postEdit($id)
	{
		$record = $this->model->requiredById($id);

		$record->fill(Input::all());

		$valid = $this->validateWithInput === true ? $record->isValid(Input::all()) : $record->isValid();

		if (!$valid) {
			return Redirect::to($this->edit_url . $id)->with('errors', $record->getErrors())->withInput();
		}

		// Run the hydration method that populates anything else that is required / runs any other
        // model interactions and save it.
		$record->hydrateRelations()->save();

		return Redirect::to($this->edit_url . $id)->with('success', new MessageBag(array('Item saved')));
	}

	/**
	 * Upload image for this record
	 * @param  Integer $id The ID of the object
	 * @return Response 
	 */
	public function postUpload($id)
	{	
		// this should only be accessible via AJAX
		if (!Request::ajax() or !$this->model->getById($id)) {
			Response::json('error', 404);
		}

		$key = $this->model->getModel()->getTableName();

		$type = get_class($this->model->getModel());

		$success = $this->uploads_mode->doUpload($id, $type, $key);

		if (!$success) {
			Response::json('error', 404);
		}

		return Response::json('success', 200);
	}

	/**
	 * Set the order of the image
	 * @return Response 
	 */
	public function postOrderImages()
	{
		// This should only be accessible via AJAX
		if (!Request::ajax()) {
			Response::json('error', 4040);
		}

		// Ensure that the object images that need to be deleted get deleted
		$this->uploads_model->setOrder(Input::get('data'));

		return Response::json('success', 200);
	}

	/**
	 * Set the URL's to be used in the views
	 * @return void
	 */
	private function setHandyUrls()
	{
		if (is_null($this->object_url)) {
			$this->object_url = url($this->urlSegment . '/' . $this->view_key);
		}

		if (is_null($this->edit_url)) {
			$this->edit_url = $this->object_url . '/edit';
		}

		if (is_null($this->new_url)) {
			$this->new_url = $this->object_url . '/new';
		}

		if (is_null($this->delete_url)) {
			$this->delete_url = $this->object_url . '/delete';
		}
	}

	/**
	 * Set the view to have variables detailing some of the key URL's 
	 * used inthe views. Trying to keep the views generic
	 * @return void
	 */
	private function shareHandyUrls()
	{
		// Share these variables with any views
		View::share('object_url', $this->object_url);
		View::share('edit_url', $this->edit_url);
		View::share('new_url', $this->new_url);
		View::share('delete_url', $this->delete_url);
	}

	/**
	 * Set the view variables for this object. If you can upload tell it,
	 * if you can tag tell it.
	 * @return  void
	 */
	private function setViewObjectAbilities()
	{
		View::share('uploadable', $this->uploadable);
		View::share('taggable', $this->taggable);
	}

	/**
	 * Set the class properties for if this object should allow upload or tags
	 * Uses reflection to check the model to see if it uses a taggable / uploadable trait
	 * @return  void 
	 */
	private function setTraitableProperties()
	{
		if (is_null($this->taggable)) {
			$this->taggable = $this->model->getModel()->isTaggable();
		}

		if (is_null($this->uploadable)) {
			$this->uploadable = $this->model->getModel()->isUploadable();
		}
	}
}