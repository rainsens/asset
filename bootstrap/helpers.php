<?php

use Rainsens\Asset\Facades\Asset;

/**
 * ---------------------------------------------------------------------------------------------------------------------
 * Helpers for end user.
 * ---------------------------------------------------------------------------------------------------------------------
 */

if (! function_exists('_asset_url')) {
	/**
	 * Get the url to asset root folder.
	 *
	 * @param string $path
	 * @return string
	 */
	function _asset_url(string $path = '') {
		return asset(config('asset.directory')) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_asset_pack_url')) {
	function _asset_pack_url(string $path = '') {
		return _asset_url('theme' . DIRECTORY_SEPARATOR . config('asset.pack')) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_asset_path')) {
	function _asset_path(string $path = '') {
		return public_path(config('asset.directory')) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_asset_pack_path')) {
	function _asset_pack_path(string $path = '') {
		return _asset_path('theme' . DIRECTORY_SEPARATOR . config('asset.pack')) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('_asset_css')) {
	/**
	 * Get the url to css file.
	 *
	 * @param array $files
	 * @param string $pack
	 * @return string
	 */
	function _asset_css(array $files = [], string $pack = '') {
		return Asset::setThemePack($pack)->getCss($files);
	}
}

if (! function_exists('_asset_css_all')) {
	/**
	 * Get the url to all css files.
	 *
	 * @param string $pack
	 * @return string
	 */
	function _asset_css_all(string $pack = '') {
		return Asset::setThemePack($pack)->getCssAll();
	}
}

if (! function_exists('_asset_required_css')) {
	function _asset_required_css(string $pack = '')
	{
		return Asset::setThemePack($pack)->getRequiredCss();
	}
}

if (! function_exists('_asset_js')) {
	/**
	 * Get the url to js file.
	 *
	 * @param array $files
	 * @param string $pack
	 * @return string
	 */
	function _asset_js(array $files = [], string $pack = '') {
		return Asset::setThemePack($pack)->getJs($files);
	}
}

if (! function_exists('_asset_js_all')) {
	/**
	 * Get the url to all js files.
	 *
	 * @param string $pack
	 * @return string
	 */
	function _asset_js_all(string $pack = '') {
		return Asset::setThemePack($pack)->getJsAll();
	}
}

if (! function_exists('_asset_required_js')) {
	function _asset_required_js(string $pack = '')
	{
		return Asset::setThemePack($pack)->getRequiredJs();
	}
}

if (! function_exists('_asset_ie')) {
	/**
	 * Get the url to ie js file.
	 *
	 * @param string $pack
	 * @return string
	 */
	function _asset_ie(string $pack = '') {
		return Asset::setThemePack($pack)->getIeJs();
	}
}

if (! function_exists('_asset_img')) {
	/**
	 * Get the url to img file.
	 *
	 * @param string $file
	 * @param string $pack
	 * @return string
	 */
	function _asset_img(string $file, string $pack = '') {
		return Asset::setThemePack($pack)->getImg($file);
	}
}



/**
 * ---------------------------------------------------------------------------------------------------------------------
 * Helpers for vendor below.
 * ---------------------------------------------------------------------------------------------------------------------
 */

if (! function_exists('asset_base_path')) {
	/**
	 * Get the path to root.
	 *
	 * @param string $path
	 * @return string
	 */
	function asset_base_path(string $path = '') {
		$path = trim($path, DIRECTORY_SEPARATOR);
		return dirname(__DIR__) . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('asset_config_path')) {
	function asset_config_path(string $path = '') {
		return asset_base_path("config") . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('asset_resource_path')) {
	function asset_resource_path(string $path = '') {
		return asset_base_path('resources') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}

if (! function_exists('asset_public_path')) {
	function asset_public_path (string $path = '') {
		return asset_base_path("public") . ($path ? DIRECTORY_SEPARATOR . $path : $path);
	}
}
