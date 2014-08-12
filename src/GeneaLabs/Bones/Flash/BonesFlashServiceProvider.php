<?php namespace GeneaLabs\Bones\Flash;

use Illuminate\Support\ServiceProvider;

class BonesFlashServiceProvider extends ServiceProvider {

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
		\View::addNamespace('bones-flash', __DIR__.'/../../../views');
		$this->package('genealabs/bones-flash');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bindShared('flash', function ($app) {
			return $app->make('GeneaLabs\Bones\Flash\FlashNotifier');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('flash');
	}

}
