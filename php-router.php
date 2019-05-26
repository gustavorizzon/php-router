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
	$class = APP_DIR . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
	if (!file_exists($class)) {
		throw new \Exception("Class not found: {$class}");
	}
	require_once($class);
});

// Booting the application router
try {
	App\Http\Router::getRouter()->boot();
} catch (\Exception $exception) {
	printf('PHP-ROUTER-ERROR: %s', $exception->getMessage());
}