<?php namespace Faiz\Cms\Comment;

use Faiz\Cms\Core\EloquentBaseModel;
use Faiz\Cms\Abstracts\Traits\TaggableRelationship;
use Faiz\Cms\Abstracts\Traits\UploadableRelationship;
use Str, Input;

class Comment extends EloquentBaseModel
{
	// use TaggableRelationship; // Enable the Tags RElationship
	// use UploadableRelationship; // Enable the Uploads RElationships

	/**
	 * The table to get the data from 
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * These are the mass-assignable keys 
	 * @var array
	 */
	protected $fillable = array('comment_id', 'user_id', 'comment_author', 'comment_author_email', 'comment_post_id', 'comment_content', 'comment_date', 'comment_parent');

	/**
	 * The validation rules 
	 * @var array
	 */
	protected $validateRules = [
		'comment_author'	=> 'required',
		'comment_content'	=> 'required'
	];

	/**
	 * Get all the replies for the comment 
	 * @return Comment 
	 */
	public function replies()
	{
		return $this->hasMany('Faiz\Cms\Comment\Comment', 'comment_parent', 'comment_id');
	}

	/**
	 * Fill the model up like we usually do but also allow us
	 * to fill some custom stuff 
	 * @param  array  $attributes The array of data, usually Input::all() 
	 * @return void             
	 */
	// public function fill(array $attributes)
	// {
	// 	parent::fill($attributes);

	// // // 	$this->slug = Str::slug($this->title, '-');
	// }
}
