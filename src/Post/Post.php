<?php namespace Faiz\Cms\Post;

use Faiz\Cms\Core\EloquentBaseModel;
use Faiz\Cms\Abstracts\Traits\TaggableRelationship;
use Faiz\Cms\Abstracts\Traits\UploadableRelationship;
use McCool\LaravelAutoPresenter\PresenterInterface;
use String, Str, Input;

/**
 * Faiz\Cms\Post\Post
 *
 * @property integer $id
 * @property string $post_title
 * @property string $post_slug
 * @property string $post_excerpt
 * @property string $post_content
 * @property string $post_type
 * @property string $post_status
 * @property integer $post_author
 * @property integer $post_parent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Faiz\Cms\Comment\Comment[] $comments
 * @property-read \Faiz\Cms\User\User $author
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostlug($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostExcerpt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostType($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePosttatus($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostAuthor($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post wherePostParent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Post\Post whereUpdatedAt($value) 
 */
class Post extends EloquentBaseModel implements PresenterInterface
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
		'post_slug'		=> 'required|unique:post,id,<id>',
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

		// Create the post excerpt
		$this->post_excerpt = String::tidy(Str::words(strip_tags($this->post_content), 100));
	}

	/**
	 * Get all comments for the post 
	 * @return Comment
	 */
	public function comments()
	{
		return $this->hasMany('Faiz\Cms\Comment\Comment', 'comment_post_id');
	}

	/**
	 * Get comment replies for each comments 
	 * @return Comment 
	 */
	public function nestedComments()
	{
		return $this->hasMany('Faiz\Cms\Comment\Comment', 'comment_post_id')
					->where('comment_parent', null);
	}

	/**
	 * Get the author for the post 
	 * @return User
	 */
	public function author()
	{
		return $this->hasOne('Faiz\Cms\User\User', 'id', 'post_author');
	}

	/**
	 * Get the post presenter 
	 * @return PostPresenter 
	 */
	public function getPresenter()
	{
		return PostPresenter::class;
	}
}
