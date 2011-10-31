<?php

require_once __DIR__.'/../Silex-KE/vendor/silex/vendor/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'           => array(__DIR__.'/../Silex-KE/vendor/silex/vendor', __DIR__.'/../vendor'),
    'Silex'             => __DIR__.'/../Silex-KE/vendor/silex/src',
    'SilexExtension'    => __DIR__.'/../Silex-KE/vendor/Silex-extentions/fate/src',
    'Assetic'           => __DIR__.'/../Silex-KE/vendor/assetic/src',

    'Openyard'          => __DIR__.'/../openyard-extensions',
));
$loader->registerPrefixes(array(
    'Pimple' => __DIR__.'/../Silex-KE/vendor/silex/vendor/pimple/lib',
    'Twig_'  => array(__DIR__.'/../Silex-KE/vendor/silex/vendor/twig/lib', __DIR__.'/../Silex-KE/vendor/Twig-extentions/Fabpot/lib/'),
));
$loader->register();
