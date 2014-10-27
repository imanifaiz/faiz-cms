<?php namespace Faiz\Cms\Post;

interface PostInterface
{
	/**
	 * Get all post by date published ascending 
	 * @return Post 
	 */
	public function getAllByDateAsc();

	/**
	 * Get all post by date published descending 
	 * @return Post 
	 */
	public function getAllByDateDesc();
}