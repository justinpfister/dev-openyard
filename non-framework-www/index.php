<?
require_once __DIR__ . '/../vendor/php-cloudfiles/cloudfiles.php';


         $username='pfister';
         $api_key="050e055f4d56a50d4441708f15f80a22";
         $auth = new CF_Authentication($username, $api_key);
         $auth->authenticate();

          if ( $auth->authenticated() )
                  echo "CF Authentication successful \n";
          else
                  echo "Authentication faile \n";

          $conn = new CF_Connection($auth);
          $container_list = $conn->list_containers();
          print_r($container_list);




?>
