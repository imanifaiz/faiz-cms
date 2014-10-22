<?php namespace Faiz\Cms\Composers;

use App;

class Page {

    /**
     * Compose the view with main nav menu bound to it
     * @param  View $view The View
     * @return null
     */
    public function compose($view)
    {
		$blocks = App::make('Faiz\Cms\Posts\PostsInterface')->getAllPages();

		foreach ($blocks as $block) {
			$menus[] = $block;
		}

		$view->with('menus', $menus);
    }

}