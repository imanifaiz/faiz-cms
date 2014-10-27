<?php namespace Faiz\Cms\Page;

use Faiz\Cms\Core\EloquentBaseModel;

/**
 * Faiz\Cms\Page\Page
 *
 * @property integer $id
 * @property string $title
 * @property string $key
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Page\Page whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Page\Page whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Page\Page whereKey($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Page\Page whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Page\Page whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Page\Page whereUpdatedAt($value) 
 */
class Page extends EloquentBaseModel {
	/**
	 * The table to get data from
	 * @var string
	 */
	protected $table = 'pages';

	/**
	 * The mass-assignable keys
	 * @var array
	 */
	protected $fillable = array('title', 'key', 'content');

	/**
	 * The validation rules;
	 * @var array
	 */
	protected $validationRules = array(
		'title' 	=> 'required',
		'key' 		=> 'required|unique:pages,id,<id>',
		'content' 	=> 'required'
	);
}