<?php namespace Faiz\Cms\Composers;

use App;

class Sidebar {

    /**
     * Compose the view with sidebar archive variable bound to it
     * @param  View $view The View
     * @return null
     */
    public function compose($view)
    {
		$archives = App::make('Faiz\Cms\Post\PostInterface')->getArchives();

		$view->with('archives', $archives);
    }

}