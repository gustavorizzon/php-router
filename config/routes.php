<?php

/**
 * To save on processing, instead of scanning the routes folder
 * each time a new request is established, we will register
 * the names of the routes files here.
 * 
 * By opting for this method, we also gain the functionality of
 * easily deactivating a routes file without having to delete it,
 * just commenting on the line that registers it.
 */

return [
	'default'
];