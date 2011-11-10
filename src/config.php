<?php

// Databases
$app['db.config.driver']    = 'pdo_mysql';
$app['db.config.dbname']    = 'openyard4';
$app['db.config.host']      = '50-57-163-193.static.cloud-ips.com';
$app['db.config.user']      = 'oydev';
$app['db.config.password']  = 'XKp2XXJ88qYF5myP';

// Debug
$app['debug'] = false;

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