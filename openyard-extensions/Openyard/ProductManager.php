<?php
namespace Openyard;

use Silex\Application;

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


    }

    public function showsession($session) {
        $test = $this->app['db'];
        $sql = "SELECT sess_data FROM sessions WHERE sess_id = '" . $session . "'";
        $results = $test->fetchAll($sql);
        echo "<br>";
        echo base64_decode($results[0]['sess_data']);
        echo "<br>";
        echo $results[0]['sess_data'];
    }

}