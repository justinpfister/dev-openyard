<?php

// Autoload
require_once __DIR__.'/../openyard-src/autoload.php';

// Silex
$app = require __DIR__.'/../openyard-src/app.php';
require __DIR__.'/../openyard-src/controllers.php';

if ($app['debug']) {
    return $app->run();
}

$app['http_cache']->run();
