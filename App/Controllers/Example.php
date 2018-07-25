<?php

namespace App\Controllers;

use App\Controllers\Controller;

class Example extends Controller
{
	public static function helloWorld()
	{
		echo 'Hello World. I\'m from Example class.';
		echo '<br>' . parent::sayHello();
	}
}
