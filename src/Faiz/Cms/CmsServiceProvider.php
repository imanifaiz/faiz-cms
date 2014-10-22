<?php namespace Faiz\Cms;
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
		$this->package('faiz/cms', null, __DIR__);
		$this->bindRepositories();

		require_once __DIR__.'/routes.php'; // Do some routing here specific to this package

		require_once __DIR__.'/Macros/BootstrapTableMacro.php'; // Bootstrap 3 table macro
		require_once __DIR__.'/Macros/BootstrapAlertMacro.php'; // Bootstrap 3 alert macro
		require_once __DIR__.'/Macros/BootstrapFormMacro.php'; // Bootstrap 3 alert macro
		
	}

	/**
	 * Bind all repositories
	 * @return void
	 */
	public function bindRepositories()
	{
		// The Posts Bindings
		App::bind('\Faiz\Cms\Posts\PostsInterface', function() {
			return new \Faiz\Cms\Posts\PostsRepository(new \Faiz\Cms\Posts\Posts);
		});

		// The Pages Bindings
		App::bind('\Faiz\Cms\Pages\PagesInterface', function() {
			return new \Faiz\Cms\Pages\PagesRepository(new \Faiz\Cms\Pages\Pages);
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