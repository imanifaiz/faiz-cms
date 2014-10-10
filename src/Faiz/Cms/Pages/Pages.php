<?php namespace Faiz\Cms\Pages;

use Faiz\Cms\Core\EloquentBaseModel;

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