<?

require_once __DIR__ . '/../vendor/php-cloudfiles/cloudfiles.php';

$basedir = __DIR__ . "/../web/";
$requestimg = $_GET['img'];
$filelocation = $_GET['img'];
$imagemod = FALSE;
#echo $_GET['img'];

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

    $imagemod = TRUE;

    if( count($varvalarray) != count($vals) || count($varvalarray) != count($vars)) {
          #the number of var/val combos should be equal. 
          header("HTTP/1.0 404 Not Found");
          exit;
    }


}


#Simplest way to check if file exists
if(!file_exists($basedir . $filelocation)) {
      header("HTTP/1.0 404 Not Found");
      exit;
}

// validates the size.. we don't want to be getting crushed with violent image requests.
function validsize($hw,$options) {
    if ( !is_array($hw) || !is_array($options) ) return false;
    $intersect = array_intersect($hw,$options);
    if ( count(array_unique($intersect)) == count(array_unique($hw)) ) {
        return true;
         } else {
        return false;
    }
}

if(    $imagemod == TRUE
    && isset($varvalarray['SL'])
    && isset($varvalarray['SY'])
    && validsize(array($varvalarray['SL'],$varvalarray['SY']),array(100,200,250,300,500,800)) == true)
 {
    $im = resize_image($basedir . $filelocation,$varvalarray['SL'],$varvalarray['SY']);

} elseif($imagemod == FALSE) {

    $im = imagecreatefromjpeg($basedir . $filelocation);

} else {

    header("HTTP/1.0 404 Not Found");
    exit;

}

  header('Content-Type: image/png');
   imagepng($im);

   // Force browser to close connection -- but run image resizing / cf uploading in the background.
   header("Content-Length: 0");
   header("Connection: close");
   flush();
   // browser should disconnect at this point

   $tempimg = tempnam('/tmp/','img');
   imagejpeg($im,$tempimg);

     #cloudfiles magic
     cf($requestimg,$tempimg);

    unlink($tempimg);
    imagedestroy($im);



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

           return "ok";
}



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