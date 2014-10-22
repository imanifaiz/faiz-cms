<?php namespace Faiz\Cms\Core;
use Faiz\Cms\Core\EloquentBaseModel;
use Faiz\Cms\Core\Exceptions\EntityNotFoundException;

/**
 * Base Eloquent Repository Class
 */
class EloquentBaseRepository
{
	protected $model;

	protected $count;

	/**
	 * Create new instance of EloquentBaseRepository
	 * @param EloquentBaseModel $model
	 */
	public function __construct(EloquentBaseModel $model)
	{
		$this->model = $model;
		
		// $this->count = Config::get('cms.pagination_count');
	}

	/**
	 * Model getter
	 * @return Eloquent
	 */
	public function getModel() 
	{
		return $this->model;
	}

	/**
	 * Model setter
	 * @param EloquentBaseModel $model 
	 */
	public function setModel(EloquentBaseModel $model) 
	{
		$this->model = $model;
	}

	/**
	 * Get everything (active only)
	 * @return Eloquent 
	 */
	public function getAll()
	{
		return $this->model->all();
	}

	/**
	 * Get only deleted items
	 * @return Eloquent 
	 */
	public function getAllTrashed() {
		return $this->model->onlyTrashed()->get();
	}

	/**
	 * Get all records with pagination
	 * @param  intger $count Number of records per page
	 * @return Eloquent        
	 */
	public function getAllPaginated($count)
	{
		return $this->model->paginate($count);
	}

	/**
	 * Get a record by its ID
	 * @param  integer $id The iID of the record
	 * @return Eloquen     
	 */
	public function getById($id) 
	{
		return $this->model->find($id);
	}

	/**
	 * Get record by its ID even if it is trashed
	 * @param  integer $id The ID of the record
	 * @return Eloquent     
	 */
	public function getByIdWithTrashed($id)
	{
		return $this->model->withTrashed()->find($id);
	}

	/**
	 * Get the record by its slug
	 * @param  string $slug The slug name
	 * @return Eloquent       
	 */
	public function getBySlug($slug)
	{
		return $this->model->where('post_slug', '=', $slug)->first();
	}

	/**
	 * Get the model by id that passed in
	 * @param  integer $id
	 * @return Eloquent     
	 */
	public function requiredById($id)
	{
		$model = $this->getById($id);

		if (!$model) {
			throw new EntityNotFoundException;
		}

		return $model;
	}

	/**
	 * Create new instance of the given model
	 * @param  array  $attributes 
	 * @return Eloquent             
	 */
	public function getNew($attributes = array())
	{
		return $this->model->newInstance($attributes);
	}

	/**
	 * Store the data that passed in
	 * @param  mixed $data 
	 * @return void       
	 */
	public function store($data)
	{
		if ($data instanceOf \Eloquent) {
			$this->storeEloquentModel($data);
		} elseif (is_array($data)) {
			$this->storeArray($data);
		}
	}

	/**
	 * Delete model that passed in
	 * @param  Eloquent $model 
	 * @return void        
	 */
	public function delete($model)
	{
		$model->delete();
	}

	/**
	 * Store the eloquent model that is passed in
	 * @param  Eloquent $model
	 * @return void        
	 */
	public function storeEloquentModel($model)
	{
		if ($model->getDirty()) {
			$model->save();
		} else {
			$model->touch();
		}
	}

	/**
	 * Store an array of data
	 * @param  array $data
	 * @return void        
	 */
	public function storeArray($data)
	{
		$model = $this->getNew($data);

		$this->storeEloquentModel($model);
	}
}