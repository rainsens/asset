<?php
namespace Rainsens\Asset\Providers;

use Rainsens\Asset\Asset;
use Illuminate\Support\ServiceProvider;
use Rainsens\Asset\Facades\Asset as AssetFacade;

class AssetServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind('asset', function ($app) {return new Asset();});
		$this->mergeConfigFrom(asset_config_path('asset.php'), 'asset');
	}
	
	public function boot()
	{
		$this->config();
	}
	
	protected function config()
	{
		$this->publishes([asset_config_path('asset.php') => config_path('asset.php')], 'config');
		
		if (! config('asset.directory')) {
			config(['asset.directory' => public_path('rainsens')]);
		}
		
		if (! isset(config('asset.packs')[config('asset.pack')])) {
			config(['asset.pack' => 'sixth']);
			config(['asset.packs' => AssetFacade::getPacks()]);
		}
	}
}
