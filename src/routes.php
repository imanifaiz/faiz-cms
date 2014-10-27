<?php 

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

/*************************
 * Route for Admin Pages
 *************************/
$urlSegment = Config::get('cms.access_url');

Route::filter('adminFilter', 'Faiz\Cms\Filters\Admin');

Route::group(array('prefix' => $urlSegment, 'before' => 'adminFilter'), function()
{
	Route::controller('/posts', 'Faiz\Cms\Controllers\Admin\AdminPostsController');
	Route::controller('/pages', 'Faiz\Cms\Controllers\Admin\AdminPagesController');
	Route::controller('', 'Faiz\Cms\Controllers\DashboardController');
	
});

/*************************
 * Redactor JS image upload 
 * and images manager
 *************************/
Route::post('redactor/imageUpload', 'Faiz\Cms\Controllers\MediaController@upload' );
Route::get('redactor/imagesManager', 'Faiz\Cms\Controllers\MediaController@imagesManager' );

/*************************
 * Route for Confide
 *************************/
Route::get('user/create', 'Faiz\Cms\Controllers\UserController@create');
Route::post('user', 'Faiz\Cms\Controllers\UserController@store');
Route::get('user/login', 'Faiz\Cms\Controllers\UserController@login');
Route::post('user/login', 'Faiz\Cms\Controllers\UserController@doLogin');
Route::get('user/confirm/{code}', 'Faiz\Cms\Controllers\UserController@confirm');
Route::get('user/forgot_password', 'Faiz\Cms\Controllers\UserController@forgotPassword');
Route::post('user/forgot_password', 'Faiz\Cms\Controllers\UserController@doForgotPassword');
Route::get('user/reset_password/{token}', 'Faiz\Cms\Controllers\UserController@resetPassword');
Route::post('user/reset_password', 'Faiz\Cms\Controllers\UserController@doResetPassword');
Route::get('user/logout', 'Faiz\Cms\Controllers\UserController@logout');

/*************************
 * Route for Frontend
 *************************/
Route::group(array('before' => 'adminFilter'), function(){
    Route::controller('filemanager', 'FilemanagerLaravelController');
});


/*************************
 * Route for Frontend
 *************************/
Route::get('/', 'Faiz\Cms\Controllers\HomeController@getIndex');
Route::get('rss', 'Faiz\Cms\Controllers\HomeController@getRss');
Route::get('{slug}', 'Faiz\Cms\Controllers\HomeController@getPost');
Route::get('archives/{date}', 'Faiz\Cms\Controllers\HomeController@getArchive');


