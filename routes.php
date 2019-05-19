<?php

use App\Http\Route;

Route::check('/', function() {
	echo 'This is the index.';
});

Route::check('/function', function () {
	echo "I routed '/function'. Its handler is a function.";
});

Route::check('/controller', 'Example@helloWorld');

Route::check('/invalid-controller', 'Fake\\Example@method');

Route::check('/invalid-method', 'Example@invalid');

Route::check('/{lang}/check', function () {
	$arg = func_get_arg(0);
	echo 'You requested the language: ' . $arg['lang'];
});

Route::check('/controller-args/{myName}/{myAge}', 'Example@showArgs');
