<?php
namespace Rainsens\Asset\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Asset
 * @package Rainsens\Asset\Facades
 * @method static \Rainsens\Asset\Asset getAvailablePacks()
 */
class Asset extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'asset';
	}
}
