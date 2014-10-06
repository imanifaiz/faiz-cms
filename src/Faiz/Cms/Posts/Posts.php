<?php namespace Faiz\Cms\Posts;

use Faiz\Cms\Core\EloquentBaseModel;
use Faiz\Cms\Abstracts\Traits\TaggableRelationship;
use Faiz\Cms\Abstracts\Traits\UploadableRelationship;
use Str, Input;

class Posts extends EloquentBaseModel
{
	// use TaggableRelationship; // Enable the Tags RElationship
	// use UploadableRelationship; // Enable the Uploads RElationships

	/**
	 * The table to get the data from
	 * @var string
	 */
	protected $table = 'posts';

	/**
	 * These are the mass-assignable keys
	 * @var array
	 */
	protected $fillable = array('post_author', 'post_title', 'post_slug', 'post_content');

	/**
	 * The validation rules
	 * @var array
	 */
	protected $validationRules = [
		'post_title'	=> 'required',
		'post_slug'		=> 'required|unique:posts,id,<id>',
		'post_content'	=> 'required'
	];

	/**
	 * Fill the model up like we usually do but also allow us
	 * to fill some custom stuff
	 * @param  array  $attributes The array of data, usually Input::all()
	 * @return void             
	 */
	public function fill(array $attributes)
	{
		parent::fill($attributes);

		$this->post_slug = Str::slug($this->post_title, '-');
	}

	/**
	 * Get all comments for the post
	 * @return Comments
	 */
	public function comments()
	{
		return $this->hasMany('Faiz\Cms\Comments\Comments', 'comment_post_id');
	}

	/**
	 * Get the author for the post
	 * @return Users
	 */
	public function author()
	{
		return $this->hasOne('Faiz\Cms\Users\Users', 'id', 'post_author');
	}
}
