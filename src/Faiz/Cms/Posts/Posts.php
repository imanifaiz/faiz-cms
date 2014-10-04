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
	protected $fillable = array('post_title', 'post_slug', 'post_content');

	/**
	 * The validation rules
	 * @var array
	 */
	protected $validateRules = [
		'post_title'	=> 'required',
		'post_slug'		=> 'required|unique:posts,id<id>',
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

		$this->slug = Str::slug($this->title, '-');
	}

	public function comments()
	{
		return $this->hasMany('Faiz\Cms\Comments\Comments', 'comment_post_id');
	}
}
