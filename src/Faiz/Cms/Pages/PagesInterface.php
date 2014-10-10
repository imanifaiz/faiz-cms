<?php namespace Faiz\Cms\Pages;

interface PagesInterface {
	/**
	 * Get page by key
	 * @param  string $key 
	 * @return Pages      
	 */
	public function getByKey($key);
}