<?php
namespace Rainsens\Asset;

trait HasThemePacks
{
	/**
	 * Packs available.
	 *
	 * @var array
	 */
	protected $packs = [
		'sixth' => [
			'css' => [
				'theme',
				'adminform',
				'nestable',
				'ladda',
				'select2',
			],
			'js' => [
				'jquery',
				'jquery-ui',
				'canvasbg',
				'ladda',
				'pnotify',
				'nestable',
				'select2',
				'maskedinput',
			]
		]
	];
	
	public function getAvailablePacks(): array
	{
		return $this->packs;
	}
}
