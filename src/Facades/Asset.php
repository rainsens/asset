<?php
namespace Rainsens\Asset\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Asset
 * @package Rainsens\Asset\Facades
 * @method static \Rainsens\Asset\Asset getPacks()
 */
class Asset extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'asset';
	}
}
