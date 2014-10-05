<?php namespace Faiz\Cms;
use App;
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
		include __DIR__.'/routes.php'; // Do some routing here specific to this package

		include __DIR__.'/Macros/BootstrapTableMacro.php'; // Bootstrap 3 table macro 
		include __DIR__.'/Macros/BootstrapAlertMacro.php'; // Bootstrap 3 alert macro
		include __DIR__.'/Macros/BootstrapFormMacro.php'; // Bootstrap 3 alert macro
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