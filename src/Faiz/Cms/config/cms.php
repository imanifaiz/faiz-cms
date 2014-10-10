<?php

/**
 * The application configuration file, use to setup globally used values
 * throughout the application.
 */
return array(

	/**
	 * The name of the application, will be used in the main management
	 * areas of the application.
	 */
	'name' => 'My Super CMS',

	/**
	 * The email address associated with support enquires on a technical basis.
	 */
	'support_email' => 'examples@example.com',

	/**
	 * The base path for uploaded files/images.
	 */
	'upload_base_path' => 'uploads/',

	/**
	 * The URL key to access the main admin area.
	 */
	'access_url' => 'admin',

	/**
	 * The menu items shown at top and side of the application.
	 */
	'menu_items' => array(
		'posts' => array(
			'name' => 'Posts',
			'icon' => 'list',
			'top' => true
		),
		'pages' => array(
			'name' => 'Pages',
			'icon' => 'th-large',
			'top' => true
		),
		'galleries' => array(
			'name' => 'Galleries',
			'icon' => 'picture',
			'top' => true
		),
		'users' => array(
			'name' => 'Users',
			'icon' => 'user',
			'top' => true
		),
		'settings' => array(
			'name' => 'Settings',
			'icon' => 'cog',
			'top' => true
		)
	)
);