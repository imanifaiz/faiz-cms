<?php

# Attach $success var to all views
View::composer('*', function($view)
{
	$success = Session::get('success', Session::get('success', new Illuminate\Support\MessageBag));

	$blocks = App::make('Faiz\Cms\Pages\PagesInterface')->getAll();

	$menus = array();

	foreach ($blocks as $block) {
		$menus[] = $block;
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

# Redactor image upload and images manager
Route::post('redactor/imageUpload', 'Faiz\Cms\Controllers\MediaController@upload' );
Route::get('redactor/imagesManager', 'Faiz\Cms\Controllers\MediaController@imagesManager' );

Route::get('galleries', function()
{
	$images = array();

	$files = File::allFiles(public_path() . '/uploads');

	foreach ($files as $file) {

		if (!strpos($file, 'thumb_')) {
			$ext = '.' . pathinfo($file, PATHINFO_EXTENSION);

			$path = explode( "/", substr($file,strpos($file,"/uploads")));
			// Remove file name
			array_pop($path);

			$image_path = implode("/", $path);

			$images[] = array("thumb" => $image_path .'/thumb_' . basename($file), "image" => $image_path .'/' . basename($file), "title" => basename($file), "link" => $image_path .'/' . basename($file));
		}
	}

	// return Response::json($images);
	$title = 'Media Galleries';

	return View::make('site.galleries', compact('images', 'title'));
});

Route::post('media/delete', function()
{
	$images = Input::get('image');

	foreach ($images as $image) {
		$path = explode( "/", substr($image,strpos($image,"/uploads")));
		// Remove file name
		array_pop($path);
		$image_path = public_path() . implode("/", $path);

		// Delete the image and its thumbnail
		$image_deleted = File::delete($image_path . '/' . basename($image));
		$thumb_deleted = File::delete($image_path . '/thumb_' . basename($image));

		if (!$image_deleted or !$thumb_deleted) {
			return 'Error while deleting the file.';
		}

		// Check that folder, if no files, just delete the folder
		if (count(File::allFiles($image_path)) == 0) {
			// Delete the month folder
			File::deleteDirectory($image_path);

			// Now check for the year folder
			$path = explode( "/", $image_path);
			// Remove file name
			array_pop($path);
			$year_folder = implode("/", $path);

			if (count(File::allFiles($year_folder)) == 0) {
				File::deleteDirectory($year_folder);
			}
		}

		return count($images) . ' file(s) successfully deleted.';
	}
});


Route::get('/', function()
{
	$posts = App::make('Faiz\Cms\Posts\PostsInterface')->getAllPaginated(15);

	$title = 'Blogs';
		
	return View::make('site.blog.index', compact('posts', 'title'));
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

Route::get('{slug}', function($slug)
{	
	$posts = App::make('Faiz\Cms\Posts\PostsInterface');

	$post = $posts->getBySlug($slug);

	if (!empty($post)) {
		$title = $post->post_title;

		return View::make('site.blog.view_post', compact('post', 'title'));
	} else {
		$pages = App::make('Faiz\Cms\Pages\PagesInterface');

		$page = $pages->getBykey($slug);

		$title = $page->title;

		return View::make('site.layouts.pages', compact('page', 'title'));
	}
});
