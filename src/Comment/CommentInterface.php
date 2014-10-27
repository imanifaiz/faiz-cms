<?php namespace Faiz\Cms\Comment;

interface CommentInterface
{
	/**
	 * Get all comment by date published ascending 
	 * @return Comment 
	 */
	public function getAllByDateAsc();

	/**
	 * Get all Comment by date published descending 
	 * @return comment 
	 */
	public function getAllByDateDesc();
}