<?php namespace Faiz\Cms\Comment;

use Faiz\Cms\Comment\Comment;
use Faiz\Cms\Core\EloquentBaseRepository;
use Faiz\Cms\Abstracts\Traits\TaggableRepository;

class CommentRepository extends EloquentBaseRepository implements CommentInterface
{
	// use TaggableRepository;

	/**
	 * Create new instance of PostsRepository 
	 * @param Post $comment 
	 */
	public function __construct(Comment $comment)
	{
		$this->model = $comment;
	}

	/**
	 * Get all post by date published ascending 
	 * @return Comment 
	 */
	public function getAllByDateAsc()
	{
		return $this->model->orderBy('comment_date', 'asc')->get();
	}

	/**
	 * Get all post by date published descending 
	 * @return Comment 
	 */
	public function getAllByDateDesc()
	{
		return $this->model->orderBy('comment_date', 'desc')->get();
	}
}