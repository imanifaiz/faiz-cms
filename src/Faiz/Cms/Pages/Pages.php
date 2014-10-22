<?php namespace Faiz\Cms\Pages;

use Faiz\Cms\Core\EloquentBaseModel;

/**
 * Faiz\Cms\Pages\Pages
 *
 * @property integer $id
 * @property string $title
 * @property string $key
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Pages\Pages whereId($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Pages\Pages whereTitle($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Pages\Pages whereKey($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Pages\Pages whereContent($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Pages\Pages whereCreatedAt($value) 
 * @method static \Illuminate\Database\Query\Builder|\Faiz\Cms\Pages\Pages whereUpdatedAt($value) 
 */
class Pages extends EloquentBaseModel {
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