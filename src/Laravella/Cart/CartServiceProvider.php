<?php namespace Laravella\Cart;

use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider {

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
		$this->package('laravella/cart');

		include __DIR__.'/../../routes/routes.php';         
		
		$this->registerCommands();

				
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        // Register 'underlyingclass' instance container to our UnderlyingClass object
        $this->app['dbgopher'] = $this->app->share(function($app)
        {
            return new DbGopher;
        });

        $this->app->booting(function()
            {
              $loader = \Illuminate\Foundation\AliasLoader::getInstance();
              $loader->alias('DbGopher', 'Laravella\Cart\Facades\DbGopher');
            });
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
	
	/** register the custom commands **/
	public function registerCommands()
	{
		$commands = array('CartInstall','CartUpdate');

		foreach ($commands as $command)
		{
			$this->{'register'.$command.'Command'}();
		}

		$this->commands(
			'command.cart.install','command.cart.update'
		);

	}	

}