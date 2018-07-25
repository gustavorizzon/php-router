<?php

namespace App\Classes;

use App\Classes\Request;

class Route
{
	public static function check (string $route, $handler)
	{
		if ($route == Request::getRequestedURI()) {
			if (is_callable($handler)) {
				$handler();
			} else if (is_string($handler)) {
				self::controller($handler);
			} else {
				throw new \Exception('The route handler is not valid! Must be a function or a controller string.');
			}
			exit();
		}
	}

	private static function controller (string $controllerString)
	{
		$controllerArray = explode('@', $controllerString);
		if (count($controllerArray) != 2) {
			throw new \Exception('The entered string is not in the proper format to continue execution.');
		}
		$controller = 'App\\Controllers\\' . str_replace('/', '\\', $controllerArray[0]);
		$method = $controllerArray[1];
		$controller::$method();
	}
}
