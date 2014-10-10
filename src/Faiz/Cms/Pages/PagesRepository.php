<?php namespace Faiz\Cms\Pages;

use Faiz\Cms\Pages\Pages;
use Faiz\Cms\Core\EloquentBaseRepository;

class PagesRepository extends EloquentBaseRepository implements PagesInterface {
	/**
	 * Initializer
	 * @param Pages $pages
	 */
	public function __construct(Pages $pages)
	{
		$this->model = $pages;
	}

	/**
	 * Get page by key
	 * @param  string $key 
	 * @return Pages      
	 */
	public function getByKey($key)
	{
		return $this->model->where('key', '=', $key)->first();
	}
}