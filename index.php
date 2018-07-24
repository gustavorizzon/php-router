<?php

// constants
define('DIR_SEP', DIRECTORY_SEPARATOR);
define('APP_DIR', __DIR__ . DIR_SEP);

// require autoload handler
require(APP_DIR . 'autoload.php');

// requiring routes file
require(APP_DIR . 'routes.php');
