<?php

namespace App\Http;

class Route
{
	/** @var string Represents the route pattern. */
	public $routePattern;

	/** @var mixed Represents the route handler. */
	public $handler;

	/**
	 * Calls the register() method
	 * 
	 * @param string $routePattern
	 * @param mixed $handler
	 */
	public static function check(string $routePattern, $handler)
	{
		self::register($routePattern, $handler);
	}

	/**
	 * Instances a Route object, defines its attributes, and registers it on the Router.
	 * 
	 * @param string $routePattern
	 * @param mixed $handler
	 */
	private static function register(string $routePattern, $handler) {
		$route = new Route;
		$route->routePattern = $routePattern;
		$route->handler = $handler;
		Router::getRouter()->registerRoute($route);
	}

	/**
	 * Intercepts all calls to static methods.
	 * Checks whether the method being called exists, if not, throws an exception.
	 * 
	 * @param mixed $name
	 * @param mixed $arguments
	 * 
	 * @throws Exception If the method is not defined
	 */
	public static function __callStatic($name, $arguments)
	{
		if (!method_exists(self::class, $name)) {
			throw new \Exception('Undefined static method: ' . self::class . '::' . $name . '()');
		}
	}
}