<?php

return [
	
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
	]
];
