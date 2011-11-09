<?php

// Databases
$app['db.config.driver']    = 'pdo_mysql';
$app['db.config.dbname']    = 'openyard4';
$app['db.config.host']      = '50-57-163-193.static.cloud-ips.com';
$app['db.config.user']      = 'oydev';
$app['db.config.password']  = 'XKp2XXJ88qYF5myP';

// Debug
$app['debug'] = true;

// Local
$app['locale'] = 'en';
$app['session.default_locale'] = $app['locale'];
$app['translator.messages'] = array(
    'en' => __DIR__.'/../resources/locales/en.yml',
    'fr' => __DIR__.'/../resources/locales/fr.yml',
    'es' => __DIR__.'/../resources/locales/es.yml',
    'pl' => __DIR__.'/../resources/locales/piglatin.yml',


);


// Cache
$app['cache.path'] = __DIR__ . '/../cache';

// Http cache
$app['http_cache.cache_dir'] = $app['cache.path'] . '/http';

// Assetic
$app['assetic.path_to_cache']       = $app['cache.path'] . DIRECTORY_SEPARATOR . 'assetic' ;
$app['assetic.path_to_web']         = __DIR__ . '/../www/assets';

//$app['assetic.input.path_to_assets']    = __DIR__ . '/../resources/assets';
$app['assetic.input.path_to_css']       = __DIR__ . '/../vendors/Twitter-bootstrap/*.css';
$app['assetic.output.path_to_css']      = '/css/styles.css';

$app['assetic.input.path_to_js']        = array(
    __DIR__ . '/../vendors/Twitter-bootstrap/js/bootstrap-twipsy.js',
    __DIR__ . '/../vendors/Twitter-bootstrap/js/bootstrap-*.js',
    __DIR__ . '/../vendors/Twitter-bootstrap/js/script.js',
);

$app['assetic.output.path_to_js']       = '/js/scripts.js';

$app['assetic.filter.yui_compressor.path'] = '/usr/share/yui-compressor/yui-compressor.jar';
