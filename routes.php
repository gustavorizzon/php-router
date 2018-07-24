<?php

use App\Classes\Route;

Route::check('/', function() {
	echo 'This is the index.';
});

Route::check('/php', function () {
	echo "I routed '/php'.";
});
