<?php namespace Faiz\Cms\Posts;

use Faiz\Cms\Core\EloquentBaseModel;
use Faiz\Cms\Abstracts\Traits\TaggableRelationship;
use Faiz\Cms\Abstracts\Traits\UploadableRelationship;
use String, Str, Input;
use McCool\LaravelAutoPresenter\PresenterInterface;

/**
 * Faiz\Cms\Posts\Posts
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Faiz\Cms\Comments\Comments[] $comments
 * @property-read \Faiz\Cms\Users\Users $author
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostSlug($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostExcerpt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostType($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostStatus($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostAuthor($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts wherePostParent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Posts\Posts whereUpdatedAt($value) 
 */
class Posts extends EloquentBaseModel implements PresenterInterface
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

		$this->post_excerpt = String::tidy(Str::words(strip_tags($this->post_content), 100));
	}

	/**
	 * Get all comments for the post
	 * @return Comments
	 */
	public function comments()
	{
		return $this->hasMany('Faiz\Cms\Comments\Comments', 'comment_post_id');
	}

	public function nestedComments()
	{
		return $this->hasMany('Faiz\Cms\Comments\Comments', 'comment_post_id')->where('comment_parent', null);
	}

	/**
	 * Get the author for the post
	 * @return Users
	 */
	public function author()
	{
		return $this->hasOne('Faiz\Cms\Users\Users', 'id', 'post_author');
	}

	public function getPresenter()
	{
		return PostsPresenter::class;
	}
}
