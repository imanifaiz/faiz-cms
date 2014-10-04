<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
# View composer for blog archive in sidebar
View::composer('cms::site.layouts.sidebar', function($view)
{
	$archives = App::make('Faiz\Cms\Posts\PostsInterface')->getArchivesDate();

	$view->with('archives', $archives);
});

Route::get('/', function()
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface')->getAllPaginated(15);

	$title = 'Blogs';
		
	return View::make('cms::site.blog.index', compact('posts', 'title'));
});

Route::get('admin', function()
{
	return View::make('cms::admin.layouts.dashboard');
});

Route::get('{slug}', function($slug)
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface');

	$post = $posts->getBySlug($slug);

		$title = $post->post_title;

		return View::make('cms::site.blog.view_post', compact('post', 'title'));
});

Route::get('archives/{date}', function($date)
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface');

	$posts = $posts->getByDate($date);

		$title = 'Blog Archives';

		return View::make('cms::site.blog.archives', compact('posts', 'title'));
});



//

// Confide routes
Route::get('users/create', 'Faiz\Cms\Controllers\UsersController@create');
Route::post('users', 'Faiz\Cms\Controllers\UsersController@store');
Route::get('users/login', 'Faiz\Cms\Controllers\UsersController@login');
Route::post('users/login', 'Faiz\Cms\Controllers\UsersController@doLogin');
Route::get('users/confirm/{code}', 'Faiz\Cms\Controllers\UsersController@confirm');
Route::get('users/forgot_password', 'Faiz\Cms\Controllers\UsersController@forgotPassword');
Route::post('users/forgot_password', 'Faiz\Cms\Controllers\UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'Faiz\Cms\Controllers\UsersController@resetPassword');
Route::post('users/reset_password', 'Faiz\Cms\Controllers\UsersController@doResetPassword');
Route::get('users/logout', 'Faiz\Cms\Controllers\UsersController@logout');

// 
$urlSegment = Config::get('cms::cms.access_url');

Route::filter('adminFilter', 'Faiz\Cms\Filters\Admin');

Route::controller($urlSegment . '/posts', 'Faiz\Cms\Controllers\admin\AdminPostsController');
