<?php namespace Faiz\Cms\Page;

use Faiz\Cms\Page\Page;
use Faiz\Cms\Core\EloquentBaseRepository;

class PageRepository extends EloquentBaseRepository implements PageInterface {
	/**
	 * Initializer
	 * @param Page $page
	 */
	public function __construct(Page $page)
	{
		$this->model = $page;
	}

	/**
	 * Get page by key
	 * @param  string $key 
	 * @return Page      
	 */
	public function getByKey($key)
	{
		return $this->model->where('key', '=', $key)->first();
	}
}