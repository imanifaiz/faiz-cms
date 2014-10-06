<?php namespace Faiz\Cms\Posts;

use Faiz\Cms\Posts\Posts;
use Faiz\Cms\Core\EloquentBaseRepository;
use Faiz\Cms\Abstracts\Traits\TaggableRepository;

class PostsRepository extends EloquentBaseRepository implements PostsInterface
{
	// use TaggableRepository;

	/**
	 * Create new instance of PostsRepository
	 * @param Post $post 
	 */
	public function __construct(Posts $post)
	{
		$this->model = $post;
	}

	/**
	 * Get all post by date published ascending
	 * @return Posts 
	 */
	public function getAllByDateAsc()
	{
		return $this->model->orderBy('created_at', 'asc')->get();
	}

	/**
	 * Get all post by date published descending
	 * @return Posts 
	 */
	public function getAllByDateDesc()
	{
		return $this->model->orderBy('created_at', 'desc')->get();
	}

	/**
	 * Get archives date from table
	 * @return  Posts
	 */
	public function getArchivesDate()
	{
		return $this->model->distinct()->get(array('created_at'));
	}

	/**
	 * Get all post base on archives date
	 * @param  date $date 
	 * @return Posts       
	 */
	public function getByDate($date)
	{
		return $this->model->whereRaw("date_format(created_at, '%m-%Y') = '$date'")
						   ->orderBy('created_at')
						   ->paginate(10);
	}
}