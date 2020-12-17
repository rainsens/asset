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
				'nestable',
				'select2',
				'ladda',
				'adminform',
				'theme',
			],
			
			'js' => [
				'jquery',
				'jquery-ui',
				'canvasbg',
				'ladda',
				'utility',
				'pnotify',
				'select2',
				'nestable',
			]
		]
	]
];
