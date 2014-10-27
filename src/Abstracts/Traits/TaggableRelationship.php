<?php namespace Faiz\Cms\Abstracts\Traits;

use Faiz\Cms\Tags\Tags as TagEloquent;
use Input;

trait TaggableRelationship
{
	/**
	 * The taggable setup for taggable classes
	 * @return Eloquent 
	 */
	public function tags()
	{
		return $this->morphMany('Faiz\Cms\Tags\Tags', 'taggable');
	}

	/**
	 * Return comma separated list of tags for use in the views
	 * @return string 
	 */
	public function getTagsCsvAttribute()
	{
		$tags = array();

		foreach ($this->tag as $tag) {
			$tags[] = $tag->tag;
		}

		return implode(',', $tags);
	}

	/**
	 * Save tags, pass in a CSV separated list
	 * @param  string $tags A comma separated list of tags
	 * @return void       
	 */
	public function saveTags($tags = null)
	{
		$tags = is_null($tags) ? Input::get('tags', false) : $tags;

		$this->tags->delete();

		if ($tags = explode(',', $tags)) {
			foreach ($tags as $tag) {
				$tagObject = new TagEloquent();
				$tagObject->tag = $tag;
				$this->tags()->save($tagObject);
			}
		}

		return;
	}
}