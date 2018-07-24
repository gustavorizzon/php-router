<?php
spl_autoload_register(function ($class) {
	$class = APP_DIR . str_replace('\\', DIR_SEP, $class) . '.php';
	if (!file_exists($class)) {
		throw new Exception("Path to class '{$class}' not found.");
	}
	require($class);
});
