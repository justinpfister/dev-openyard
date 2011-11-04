<?

require_once __DIR__ . '/../vendor/php-cloudfiles/cloudfiles.php';

#cf('tempfolder/30heidilane.jpg');
$basedir = __DIR__ . "/../web/";
$filelocation = $_GET['img'];

echo $_GET['img'];

$reg1pat = '/([^_]+)(_[^.]+.)(jpg|png|gif)/';

preg_match($reg1pat,$filelocation,$matches);

if(count($matches) == 4) {
    $filelocation = $matches[1] . $matches[3];

    $valstring = $matches[2];
    $reg2pat = '/([a-zA-Z]{2})([0-9]+)/';
    preg_match_all($reg2pat,$valstring,$varray);

    $vars = $varray[1];
    $vals = $varray[2];
    $varvalarray = array_combine($vars,$vals);

    print_r($varvalarray);

}


#Simplest way to check if file exists
if(!file_exists($basedir . $filelocation)) {
      header("HTTP/1.0 404 Not Found");
      exit;



function cf($filename,$tmplocation) {
         $username='pfister';
         $api_key="050e055f4d56a50d4441708f15f80a22";
         $auth = new CF_Authentication($username, $api_key);
         $auth->authenticate();

          if ( $auth->authenticated() )  {
            #  echo "CF Authentication successful \n";
          }
          else {
           #       echo "Authentication faile \n";
          }
          $conn = new CF_Connection($auth);
          $container_prodimg = $conn->get_container("productimages");


          #$filename = urlencode('testdir/testimg.jpg');
          #$filename = 'tempfolder/30heidilane.jpg';

          $object = $container_prodimg->create_object($filename);

#          $object->load_from_filename($basedir . $filename);
           $object->load_from_filename($tmplocation);


          $all_objects = $container_prodimg->list_objects();

          #$make_paths = $container_prodimg->create_paths($filename);

          #var_dump($all_objects);

            #return "ok";
}

// create curl resource
 #       $ch = curl_init();

        // set url
#        curl_setopt($ch, CURLOPT_URL, 'http://' . $_GET['img']);

        //return the transfer as a string
 #       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
#        $output = curl_exec($ch);

        // close curl resource to free up system resources
#        curl_close($ch);

//Display the image in the browser
//header('Content-type: image/jpg');



}

# Nitty Gritty Details

  

$im = resize_image($basedir . $filelocation,125,125);

    header('Content-Type: image/png');
   imagepng($im);

  #  $tempimg = tempnam('/tmp/','img');

#    imagejpeg($im,$tempimg);
    //fseek($tempimg, 0);

        #cloudfiles magic
 #       cf($filelocation,$tempimg);

  #  unlink($tempimg);
   # imagedestroy($im);
#}
#else {
 #   echo 'An error occurred.';
#}






function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*($r-$w/$h)));
        } else {
            $height = ceil($height-($height*($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}




?>