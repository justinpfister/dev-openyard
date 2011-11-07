<?php

require_once __DIR__.'/../vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'           => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/symfony/src'),
    'Silex'             => __DIR__.'/../vendor/silex/src',
    'SilexExtension'    => __DIR__.'/../Silex-KE/vendor/Silex-extentions/fate/src',
    'Assetic'           => __DIR__.'/../Silex-KE/vendor/assetic/src',

    'Openyard'          => __DIR__.'/../openyard-extensions',
));
$loader->registerPrefixes(array(
    'Pimple' => __DIR__.'/../vendor/silex/vendor/pimple/lib',
    'Twig_'  => array(__DIR__.'/../vendor/silex/vendor/twig/lib', __DIR__.'/../Silex-KE/vendor/Twig-extentions/Fabpot/lib/'),
));
$loader->register();
