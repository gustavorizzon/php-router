<?php

/**
 * PHP Router
 * A PHP routing system.
 * 
 * @link https://github.com/gustavorizzon/php-router <GitHub Repository>
 * @author Gustavo Rizzon
 */


/**
 * Getting PHP Router Constants
 */
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'constants' . DIRECTORY_SEPARATOR . 'php-router.php');

/**
 * Registering the autoload function
 * 
 * This function will be responsible for requiring
 * the needed classes for the current context.
 */
spl_autoload_register(function ($class) {
	// Gets a fully qualified path for the class
	$class = APP_DIR . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

	// If the class doesn't exists, throws an Exception
	if (!file_exists($class)) {
		die("Class not found: {$class}");
	}

	// Requires the requested class
	require_once($class);
});

// Requiring the routes file
require_once(APP_DIR . DIRECTORY_SEPARATOR . 'routes.php');