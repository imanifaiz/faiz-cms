<?php namespace Faiz\Cms\Comments;

use Faiz\Cms\Comments\Comments;
use Faiz\Cms\Core\EloquentBaseRepository;
use Faiz\Cms\Abstracts\Traits\TaggableRepository;

class CommentsRepository extends EloquentBaseRepository implements CommentsInterface
{
	// use TaggableRepository;

	/**
	 * Create new instance of PostsRepository
	 * @param Post $comment 
	 */
	public function __construct(Comments $comment)
	{
		$this->model = $comment;
	}

	/**
	 * Get all post by date published ascending
	 * @return Comments 
	 */
	public function getAllByDateAsc()
	{
		return $this->model->orderBy('comment_date', 'asc')->get();
	}

	/**
	 * Get all post by date published descending
	 * @return Comments 
	 */
	public function getAllByDateDesc()
	{
		return $this->model->orderBy('comment_date', 'desc')->get();
	}
}