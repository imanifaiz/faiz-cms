<?php namespace Faiz\Cms\ServiceProvider;

use App, Log, Request, Response, View, Config;
use Illuminate\Support\ServiceProvider;

class CmsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('faiz/cms');
		$this->bindRepositories();

		require_once __DIR__.'/../Macros/BootstrapTableMacro.php'; // Bootstrap 3 table macro
		require_once __DIR__.'/../Macros/BootstrapAlertMacro.php'; // Bootstrap 3 alert macro
		require_once __DIR__.'/../Macros/BootstrapFormMacro.php'; // Bootstrap 3 alert macro
		
	}

	/**
	 * Bind all repositories
	 * @return void
	 */
	public function bindRepositories()
	{
		// The Post Bindings
		App::bind('\Faiz\Cms\Post\PostInterface', function() {
			return new \Faiz\Cms\Post\PostRepository(new \Faiz\Cms\Post\Post);
		});

		// The Page Bindings
		App::bind('\Faiz\Cms\Page\PageInterface', function() {
			return new \Faiz\Cms\Page\PageRepository(new \Faiz\Cms\Page\Page);
		});
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}