<?php

namespace App\Classes;

class Request
{
	public static function getRequestedURI()
	{
		return explode('?', getenv('REQUEST_URI'))[0];
	}
}
