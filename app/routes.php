<?php

# Attach $success var to all views
View::composer('*', function($view)
{
	$success = Session::get('success', Session::get('success', new Illuminate\Support\MessageBag));

	$blocks = App::make('Faiz\Cms\Posts\PostsInterface')->getAll();

	$menus = array();

	foreach ($blocks as $block) {
		$menus[] = $block->author->username;
	}

	$view->with('success', $success)
		 ->with('menus', $menus);
});

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

Route::get('{slug}', function($slug)
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

Route::get('rss', function()
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface')->getAll();

	$data = array(
		'posts'   => $posts,
		'updated' => isset($posts[0]) ? $posts[0]->atom_date : date('Y-m-d H:i:s'),
	);

	return Response::view('site.atom', $data, 200, array(
		'Content-Type' => 'application/rss+xml; charset=UTF-8',
	));
});
