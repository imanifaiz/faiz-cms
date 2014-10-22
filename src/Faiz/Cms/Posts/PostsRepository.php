<?php namespace Faiz\Cms\Posts;

use Faiz\Cms\Posts\Posts;
use Faiz\Cms\Core\EloquentBaseRepository;

class PostsRepository extends EloquentBaseRepository implements PostsInterface {
	/**
	 * Initializer
	 * @param Posts $Posts
	 */
	public function __construct(Posts $posts)
	{
		$this->model = $posts;
	}

	/**
	 * Get all posts by date published ascending
	 * @return Posts 
	 */
	public function getAllByDateAsc() 
	{
		return $this->model->orderBy('created_at', 'asc');
	}

	/**
	 * Get all posts by date published descending
	 * @return Posts 
	 */
	public function getAllByDateDesc() 
	{
		return $this->model->orderBy('created_at', 'desc');
	}

	/**
	 * Get page by key
	 * @param  string $key 
	 * @return Posts      
	 */
	public function getByKey($key)
	{
		return $this->model->where('key', '=', $key)->first();
	}

	public function getArchives()
	{
		return $this->model->distinct()->get([
			\DB::raw("date_format(created_at, '%m-%Y') as archive_date")
		]);
	}

	public function getAllPosts()
	{
		return $this->model->where('post_type', 'post')->get();
	}

	public function getAllPages()
	{
		return $this->model->where('post_type', 'page')->get();
	}
}