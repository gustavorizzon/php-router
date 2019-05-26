<?php

namespace App\Http;

class RouteParser
{
	public function check (string $route, $handler)
	{
		$parseResult = $this->parse($route);
		if ($parseResult->run) {
			if ($parseResult->isDynamic) {
				$this->run($handler, $parseResult->args);
			} else {
				$this->run($handler);
			}
			return true;
		}
		return false;
	}

	private function parse (string $route)
	{
		$run = false;
		$isDynamic = false;
		$args = [];
		if ($route == Request::getRequestedURI()) {
			$run = true;
		} else {
			if (strpos($route, '{')) {
				$route = explode('/', $route);
				$uri = Request::getRequestedURIExploded();
				$routeCount = count($route);
				if ($routeCount == count($uri)) {
					$run = true;
					$isDynamic = true;
					for ($i = 1; $i < $routeCount; $i++) {
						if ($route[$i] != $uri[$i]) {
							preg_match('/(?<=\{).+?(?=\})/', $route[$i], $match);
							if (empty($match)) {
								$run = false;
								break;
							} else {
								$args[$match[0]] = $uri[$i];
							}
						}
					}
				}
			}
		}
		return (object) [
			'run' => $run,
			'isDynamic' => $isDynamic,
			'args' => $args
		];
	}

	private function run ($handler, array $args = [])
	{
		if (is_callable($handler)) {
			$handler($args);
		} else if (is_string($handler)) {
			$controller = $this->prepareControllerCall($handler);
			$this->callController($controller[0], $controller[1], $args);
		} else {
			throw new \Exception('The route handler is not valid! Must be a function or a controller string.');
		}
	}

	private function prepareControllerCall (string $controllerString)
	{
		$controllerArray = explode('@', $controllerString);
		if (count($controllerArray) != 2) {
			throw new \Exception('The entered string is not in the proper format to continue execution.');
		}
		$controllerArray[0] = 'App\\Controllers\\' . str_replace('/', '\\', $controllerArray[0]);
		return $controllerArray;
	}

	private function callController (string $controllerPath, string $methodName, array $args)
	{
		$controllerPath::$methodName($args);
	}
}
