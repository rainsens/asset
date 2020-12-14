<?php
namespace Rainsens\Asset;

use Exception;
use Illuminate\Support\Facades\File;

class Asset
{
	/**
	 * Packs available.
	 *
	 * @var array
	 */
	protected $packs = [
		'sixth' => [
			'css' => [
				'nestable',
				'select2',
				'theme',
			],
			'js' => [
				'jquery',
				'jquery-ui',
				'canvasbg',
				'utility',
				'pnotify',
			]
		]
	];
	
	public function __construct()
	{
		$this->initAsset();
	}
	
	public function initAsset()
	{
		if (! $this->hasAssetSymlink()) {
			$this->makeAssetSymlink();
		}
	}
	
	public function setPack(string $pack = ''): Asset
	{
		if (isset($this->packs[$pack])) {
			config(['asset.pack' => $pack]);
		}
		return $this;
	}
	
	protected function isHttpFileExisting(string $url)
	{
		try {
			return strlen(file_get_contents($url)) > 0;
		} catch (Exception $exception) {
			return false;
		}
	}
	
	/**
	 * <link href="" rel="stylesheet">
	 *
	 * @param string $href
	 * @return string
	 */
	protected function getCssLinkTag(string $href)
	{
		if (! $this->isHttpFileExisting($href)) {
			return '';
		}
		return "<link href='{$href}' rel='stylesheet'>\n";
	}
	
	/**
	 * <script src=""></script>
	 *
	 * @param string $src
	 * @return string
	 */
	protected function getJsScriptTag(string $src)
	{
		if (! $this->isHttpFileExisting($src)) {
			return '';
		}
		return "<script src='{$src}'></script>\n";
	}
	
	public function getRequiredCss()
	{
		$appCssUrl = _asset_url('app.css');
		return $this->getCssLinkTag($appCssUrl);
	}
	
	public function getCss(array $names = []): string
	{
		$css = "";
		foreach ($names as $name) {
			$url = _asset_pack_url("css/{$name}.css");
			$css .= $this->getCssLinkTag($url);
		}
		$css .= $this->getRequiredCss();
		return $css;
	}
	
	public function getCssAll(): string
	{
		$files = config('asset.packs')[config('asset.pack')]['css'];
		
		$css = "";
		foreach ($files as $file) {
			$url = _asset_pack_url("css/{$file}.css");
			$css .= $this->getCssLinkTag($url);
		}
		$css .= $this->getRequiredCss();
		return $css;
	}
	
	public function getRequiredJs()
	{
		$assetJsUrl = _asset_pack_url('js/asset.js');
		$mainJsUrl = _asset_pack_url('js/main.js');
		$appJsUrl = _asset_url('app.js');
		
		$js  = $this->getJsScriptTag($assetJsUrl);
		$js .= $this->getJsScriptTag($mainJsUrl);
		$js .= $this->getJsScriptTag($appJsUrl);
		
		$script = <<<SCRIPT

<script>
	$(function () {
		"use strict";
        Core.init();
        Asset.init();
	});
	
	function admNotify(style, text) {
	    new PNotify({
		    title: 'System Notification',
		    text: text,
		    shadow: true,
		    type: style,
            width: '25%',
		    delay: 1500
	    });
    }
</script>

SCRIPT;

		$js .= $script;
		return $js;
	}
	
	public function getJs(array $names = []): string
	{
		$script = '';
		foreach ($names as $name) {
			$url = _asset_pack_url("js/{$name}.js");
			$script .= $this->getJsScriptTag($url);
		}
		$script .= $this->getRequiredJs();
		return $script;
	}
	
	public function getJsAll(): string
	{
		$files = config('asset.packs')[config('asset.pack')]['js'];
		
		$script = "";
		foreach ($files as $file) {
			if ($file == 'html5shiv' || $file == 'respond.js') {
				continue;
			}
			$url = _asset_pack_url("js/{$file}.js");
			$script .= $this->getJsScriptTag($url);
		}
		$script .= $this->getRequiredJs();
		return $script;
	}
	
	public function getIeJs(): string
	{
		$scripts  = "<!--[if lt IE 9]>\n";
		$scripts .= $this->getJsScriptTag(_asset_pack_url("js/html5shiv.js"));
		$scripts .= $this->getJsScriptTag(_asset_pack_url("js/respond.js"));
		$scripts .= "<![endif]-->\n";
		
		return $scripts;
	}
	
	public function getImg(string $name): string
	{
		$packUrl = _asset_pack_url();
		
		if ($url = "{$packUrl}/img/{$name}") {
			return $url;
		}
		return null;
	}
	
	protected function hasAssetSymlink()
	{
		return is_link(_asset_path());
	}
	
	protected function makeAssetSymlink()
	{
		File::link(asset_public_path('rainsens'), _asset_path());
	}
	
	public function getPacks(): array
	{
		return $this->packs;
	}
}
