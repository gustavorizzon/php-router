<?php

use App\Http\Route;

/**
 * Here you will find the default routes of the web application.
 * 
 * All the routes defined in this file will start from the root
 * of the url, that is, from /
 * 
 * If, for example, you want to separate API routes from the default
 * routes, then create another file named api.php in this folder and
 * automatically all the routes defined in this file will assume the
 * /api prefix.
 * 
 */

Route::check('/', function() {
	echo 'Hello World!';
});