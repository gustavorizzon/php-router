<?php

namespace App\Http;

class Router
{

	/** 
	 * @var Router|null Router Instance
	 */
	private static $router;

	/**
	 * @var array<Route> List of registered routes
	 */
	private $registeredRoutes = [];

	/**
	 * Router start point.
	 * 
	 * @throws Exception
	 */
	public function boot()
	{
		try {
			$registeredRoutesFileNames = $this->getRegisteredRoutesFileNames();
			$this->loadRoutesFiles($registeredRoutesFileNames);
			$this->route();
		} catch (\Exception $exception) {
			throw $exception;
		}
	}

	/**
	 * Iterates through the registered routes.
	 * The valid route will be executed.
	 */
	private function route()
	{
		$routeParser = new RouteParser;
		foreach ($this->registeredRoutes as $route) {
			if ($routeParser->check($route->routePattern, $route->handler)) {
				break;
			}
		}
	}

	/**
	 * Loads the registered routes files that were passed by parameter.
	 * 
	 * @param array $registeredRoutesFileNames
	 * 
	 * @throws Exception If the file does not exists
	 */
	private function loadRoutesFiles(array $registeredRoutesFileNames)
	{
		foreach ($registeredRoutesFileNames as $fileName) {
			$filePath = APP_DIR . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . $fileName . '.php';
			if (!file_exists($filePath)) {
				throw new \Exception("Routes file not found: {$filePath}");
			}
			require_once($filePath);
		}
	}

	/**
	 * Returns the registered routes file names.
	 * 
	 * @return array
	 */
	private function getRegisteredRoutesFileNames()
	{
		return require_once(APP_DIR . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routes.php');
	}

	/**
	 * Register a route
	 * 
	 * @param Route $route
	 */
	public function registerRoute(Route $route)
	{
		$this->registeredRoutes[] = $route;
	}

	/**
	 * Returns its own instance.
	 * 
	 * @return Router
	 */
	public static function getRouter()
	{
		if (!isset(self::$router)) {
			self::$router = new self;
		}
		return self::$router;
	}
}