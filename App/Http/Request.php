<?php

namespace App\Http;

class Request
{
	/**
	 * Returns the requested URI
	 * 
	 * @return string
	 */
	public static function getRequestedURI()
	{
		return explode('?', getenv('REQUEST_URI'))[0];
	}

	/**
	 * Returns the requested URI exploded
	 * 
	 * @param string $delimiter The explode() delimiter (Optional) (Default = '/')
	 * 
	 * @return array
	 */
	public static function getRequestedURIExploded (string $delimiter = '/')
	{
		return explode($delimiter, self::getRequestedURI());
	}
}
