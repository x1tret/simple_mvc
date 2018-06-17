<?php

define('DOC_ROOT',  dirname(dirname(__FILE__)));
define('APP_ENV', getenv('APP_ENV') ? getenv('APP_ENV') : 'production');

include_once '../bootstrap.php';
Bootstrap::autoload();
$request = new Request();
$response = Route::run($request);
$response->send();