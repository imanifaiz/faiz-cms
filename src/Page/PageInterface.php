<?php namespace Faiz\Cms\Page;

interface PageInterface {
	/**
	 * Get page by key
	 * @param  string $key 
	 * @return Page      
	 */
	public function getByKey($key);
}