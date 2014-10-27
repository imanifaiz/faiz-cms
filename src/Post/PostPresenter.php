<?php namespace Faiz\Cms\Post;

use McCool\LaravelAutoPresenter\BasePresenter;
use Carbon;

class PostPresenter extends BasePresenter {

	/**
	 * Initialize new instance 
	 * @param Post $post 
	 */
	public function __construct(Post $post)
	{
		$this->resource = $post;
	}

	/**
	 * Format the post created date 
	 * @return Date 
	 */
	public function created_at()
	{
		return date('d F Y, H:i:s a', strtotime(Carbon::createFromFormat('Y-m-d H:i:s', $this->resource->created_at, 'GMT')));
	}

	/**
	 * Format the archive date 
	 * @return Date 
	 */
	public function archive_date()
	{
		return date('F Y', strtotime(Carbon::createFromFormat('m-Y', $this->resource->archive_date)));
	}
}