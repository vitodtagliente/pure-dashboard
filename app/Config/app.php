<?php

return array(

	// application names
	// 'name' => 'pure',
	'name' => 'pure',
	'shortname' => 'pure',

	// is the application in development mode?
	// 'development_mode' => true,
	'development_mode' => true,

	// be sure to change this variable, it is used by session handler
	// 'security_string' => 'pure.application'
	'security_string' => 'pure.application',

	// set this with the User model class, it is used by Auth function library
	// 'auth_class_name' => '',
	'auth_class_name' => 'App\Models\User',

	// put there the Application Service classes
	// 'services' => array(),
	'services' => array(
		'App\Services\ModuleService'
	),

	// put there the Schemas that should be created at startup time
	// 'schemas' => array(),
	'schemas' => array(
		'App\Schemas\UserSchema',
		'App\Schemas\ModuleSchema'
	),

	// Enable to show database queries in debug mode
	// 'debug_database_queries' => false
	'debug_database_queries' => false
);

?>