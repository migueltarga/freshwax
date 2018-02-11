<?php

return [

	'default' => env('LOG_CHANNEL', 'stack'),

	'channels' => [

		'stack' => [
			'driver' => 'stack',
			'channels' => ['single','spaces'],
		],

		'single' => [
			'driver' => 'single',
			'path' => storage_path('logs/laravel.log'),
			'level' => 'debug',
		],

		'daily' => [
			'driver' => 'daily',
			'path' => storage_path('logs/laravel.log'),
			'level' => 'debug',
			'days' => 7,
		],

		'slack' => [
			'driver' => 'slack',
			'url' => env('LOG_SLACK_WEBHOOK_URL'),
			'username' => 'Laravel Log',
			'emoji' => ':boom:',
			'level' => 'critical',
		],

		'syslog' => [
			'driver' => 'syslog',
			'level' => 'debug',
		],

		'errorlog' => [
			'driver' => 'errorlog',
			'level' => 'debug',
		],

		'daily' => [
			'driver' => 'daily',
			'path' => storage_path('logs/laravel.log'),
			'level' => 'debug',
		],

		'spaces' => [
			'driver' => 'syslog',
			'path' => storage_path('logs/spaces.log'),
			'level' => 'debug',
		],
	]
];
