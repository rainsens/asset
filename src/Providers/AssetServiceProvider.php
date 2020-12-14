<?php
namespace Rainsens\Asset\Providers;

use Rainsens\Asset\Asset;
use Illuminate\Support\ServiceProvider;
use Rainsens\Asset\Components\Buttons\Button;
use Rainsens\Asset\Components\Buttons\DropdownButton;
use Rainsens\Asset\Components\Buttons\GroupButton;
use Rainsens\Asset\Facades\Asset as AssetFacade;

class AssetServiceProvider extends ServiceProvider
{
	protected $components = [
		Button::class,
		GroupButton::class,
		DropdownButton::class,
	];
	
	public function register()
	{
		$this->app->bind('asset', function () {return new Asset();});
		$this->mergeConfigFrom(asset_config_path('asset.php'), 'asset');
	}
	
	public function boot()
	{
		$this->config();
		$this->loadViewsFrom(asset_resource_path('views'), 'asset');
		$this->loadViewComponentsAs('widget', $this->components);
	}
	
	protected function config()
	{
		$this->publishes([asset_config_path('asset.php') => config_path('asset.php')], 'config');
		
		if (empty(config('asset.directory'))) {
			config(['asset.directory' => public_path('rainsens')]);
		}
		
		if (empty(config('asset.packs')[config('asset.pack')])) {
			config(['asset.pack' => 'sixth']);
			config(['asset.packs' => AssetFacade::getPacks()]);
		}
	}
}
