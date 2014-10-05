<?php

# View composer for blog archive in sidebar
View::composer('site.layouts.sidebar', function($view)
{
	$archives = App::make('Faiz\Cms\Posts\PostsInterface')->getArchivesDate();

	$view->with('archives', $archives);
});

View::composer('site.blog.index', function($view)
{	
	$view->with('success', Session::get('success', new Illuminate\Support\MessageBag));
});

Route::get('/', function()
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface')->getAllPaginated(15);

	$title = 'Blogs';
		
	return View::make('site.blog.index', compact('posts', 'title'));
});

Route::get('blog/{slug}', function($slug)
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface');

	$post = $posts->getBySlug($slug);

		$title = $post->post_title;

		return View::make('site.blog.view_post', compact('post', 'title'));
});

Route::get('archives/{date}', function($date)
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface');

	$posts = $posts->getByDate($date);

		$title = 'Blog Archives';

		return View::make('site.blog.archives', compact('posts', 'title'));
});
