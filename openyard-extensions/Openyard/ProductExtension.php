<?php
namespace Openyard;

use Silex\ServiceProviderInterface;
use Silex\Application;

/**
 * Description of newPHPClass
 *
 * @author justin.pfister
 */
class ProductExtension implements ServiceProviderInterface {

    public function register(Application $app){

        // ProductProvider
        $app['product'] = $app->share(function() use($app){
            return new ProductProvider();
        });

        // ProductManager -- Database Specific
        $app['productdata'] = $app->share(function() use($app){
            return new ProductManager();
        });

        // ProductSearch -- Product Search
        $app['productsearch'] = $app->share(function() use($app){
            return new ProductSearch();
        });


    }
}
