<?php namespace Faiz\Cms\Post;

use DB;
use Faiz\Cms\Post\Post;
use Faiz\Cms\Core\EloquentBaseRepository;

class PostRepository extends EloquentBaseRepository implements PostInterface {

	/**
	 * Initializer 
	 * @param Post $Post
	 */
	public function __construct(Post $post)
	{
		$this->model = $post;
		$this->count = 15;
	}

	/**
	 * Get all post by date published ascending 
	 * @return Post 
	 */
	public function getAllByDateAsc() 
	{
		return $this->model->orderBy('created_at', 'asc');
	}

	/**
	 * Get all post by date published descending 
	 * @return Post 
	 */
	public function getAllByDateDesc() 
	{
		return $this->model->orderBy('created_at', 'desc');
	}

	/**
	 * Get page by key
	 * @param  string $key 
	 * @return Post      
	 */
	public function getByKey($key)
	{
		return $this->model->where('key', '=', $key)->first();
	}

	/**
	 * Get archive date for all post 
	 * @return Date 
	 */
	public function getArchives()
	{
		return $this->model->distinct()->get([
			DB::raw("date_format(created_at, '%m-%Y') as archive_date")
		]);
	}

	/**
	 * Get all post 
	 * @return Eloquent 
	 */
	public function getAllPosts()
	{
		return $this->model->where('post_type', 'post')->get();
	}

	/**
	 * Get all pages 
	 * @return Eloquent 
	 */
	public function getAllPages()
	{
		return $this->model->where('post_type', 'page')->get();
	}

	/**
	 * Get all post with pagination 
	 * @return Eloquent 
	 */
	public function getAllPostsPaginate()
	{
		return $this->model->where('post_type', 'post')->orderBy('created_at', 'desc')->paginate($this->count);
	}

	/**
	 * Get the record by created_date 
	 * @param  Date $date 
	 * @return Eloquent       
	 */
	public function getByArchivesDate($date)
	{
		return $this->model->whereRaw("date_format(created_at, '%M %Y') = '$date' and post_type = 'post'")
							->orderBy('created_at', 'desc')
							->paginate($this->count);
	}
}