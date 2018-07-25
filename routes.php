<?php

use App\Classes\Route;

Route::check('/', function() {
	echo 'This is the index.';
});

Route::check('/function', function () {
	echo "I routed '/function'. Its handler is a function.";
});

Route::check('/controller', 'Example@helloWorld');

Route::check('/invalid-controller', 'Fake\\Example@method');

Route::check('/invalid-method', 'Example@invalid');
