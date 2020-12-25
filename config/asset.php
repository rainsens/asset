<?php

return [
	
	'title' => 'Rainsens Asset Title',
	
	'keywords' => 'Rainsens Asset Keywords',
	
	'description' => 'Rainsens Asset Description',
	
	/**
	 * Assets directory under public folder.
	 */
	'directory' => 'rainsens',
	
	/**
	 * The default pack.
	 */
	'pack' => 'sixth',
	
	/**
	 * All packs available.
	 */
	'packs' => [
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
			]
		]
	]
];
