<?php
namespace Rainsens\Asset;

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
	
	protected function getRequiredCss()
	{
		$appCssUrl = _asset_url('app.css');
		
		$css = "<link href='{$appCssUrl}' rel='stylesheet'>\n";
		
		return $css;
	}
	
	public function getCss(array $names = []): string
	{
		$css = "";
		foreach ($names as $name) {
			$url = _asset_pack_url("css/{$name}.css");
			$css .= "<link href='{$url}' rel='stylesheet'>\n";
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
			$css .= "<link href='{$url}' rel='stylesheet'>\n";
		}
		
		$css .= $this->getRequiredCss();
		
		return $css;
	}
	
	protected function getRequiredJs()
	{
		$assetJsUrl = _asset_pack_url('js/asset.js');
		$mainJsUrl = _asset_pack_url('js/main.js');
		$appJsUrl = _asset_url('app.js');
		
		$js  = "<script src='{$assetJsUrl}'></script>\n";
		$js .= "<script src='{$mainJsUrl}'></script>\n";
		$js .= "<script src='{$appJsUrl}'></script>\n";
		
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
		$scripts = '';
		foreach ($names as $name) {
			$url = _asset_pack_url("js/{$name}.js");
			$scripts .= "<script src='{$url}'></script>\n";
		}
		
		$scripts .= $this->getRequiredJs();
		
		return $scripts;
	}
	
	public function getJsAll(): string
	{
		$files = config('asset.packs')[config('asset.pack')]['js'];;
		
		$scripts = "";
		foreach ($files as $file) {
			if ($file == 'html5shiv' || $file == 'respond.js') {
				continue;
			}
			$url = _asset_pack_url("js/{$file}.js");
			$scripts .= "<script src='{$url}'></script>\n";
		}
		
		$scripts .= $this->getRequiredJs();
		
		return $scripts;
	}
	
	public function getIeJs(): string
	{
		$packUrl = _asset_pack_url();
		
		$scripts  = "<!--[if lt IE 9]>\n";
		$scripts .= "<script src='{$packUrl}/js/html5shiv.js'></script>\n";
		$scripts .= "<script src='{$packUrl}/js/respond.js'></script>\n";
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
