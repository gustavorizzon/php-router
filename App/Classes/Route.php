<?php

namespace App\Classes;

use App\Classes\Request;

class Route
{
	public static function check ($route, $handler)
	{
		if ($route == Request::getRequestedURI()) {
			$handler();
			exit();
		}
	}
}
