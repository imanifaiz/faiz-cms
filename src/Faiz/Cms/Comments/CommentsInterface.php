<?php namespace Faiz\Cms\Comments;

interface CommentsInterface
{
	/**
	 * Get all comments by date published ascending
	 * @return Comments 
	 */
	public function getAllByDateAsc();

	/**
	 * Get all Comments by date published descending
	 * @return comments 
	 */
	public function getAllByDateDesc();
}