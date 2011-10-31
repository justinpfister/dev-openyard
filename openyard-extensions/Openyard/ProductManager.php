<?php
namespace Openyard;

use Silex\Application;
//use Silex\Provider\DoctrineServiceProvider;

class ProductManager {
    private $test;
    private $app;

    public function __construct() {
        $this->test = 12;
    }

    public function getTest() {

        return $this->test;
    }

    public function setTest($val) {

        $this->test = $val;
        return true;
    }

    public function setApp($app) {
        return $this->app = $app;
    }

    public function ddb() {

              $test = $this->app['db'];
              $results = $test->fetchAll('SELECT * FROM users');
              var_dump($results);
        
        
        echo "test";

    }

}