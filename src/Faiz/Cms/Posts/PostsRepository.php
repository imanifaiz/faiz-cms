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
		return $this->model->orderBy('post_date', 'asc')->get();
	}

	/**
	 * Get all post by date published descending
	 * @return Posts 
	 */
	public function getAllByDateDesc()
	{
		return $this->model->orderBy('post_date', 'desc')->get();
	}

	/**
	 * Get archives date from table
	 * @return  Posts
	 */
	public function getArchivesDate()
	{
		return $this->model->distinct()->get(array('post_date'));
	}

	/**
	 * Get all post base on archives date
	 * @param  date $date 
	 * @return Posts       
	 */
	public function getByDate($date)
	{
		return $this->model->whereRaw("date_format(post_date, '%m-%Y') = '$date'")
						   ->orderBy('post_date')
						   ->paginate(10);
	}

	/**
	 * Get all comments for the post
	 * @return Comments
	 */
	public function comments()
	{
		return $this->hasMany('Faiz\Cms\Comments\Comments', 'comments');
	}	
}