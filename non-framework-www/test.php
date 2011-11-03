<?

//if (!isset($_GET['img'])) {
//    echo 'no img';
//    exit;
//}

    #echo "test works";
    #exit;

#echo $_GET['img'];

// create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, 'http://' . $_GET['img']);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

//Display the image in the browser
//header('Content-type: image/jpg');


if(($im = @imagecreatefromstring($output)) == FALSE) {
    header("HTTP/1.0 404 Not Found");
    exit;
}
  

if ($im !== false) {
    header('Content-Type: image/png');
    imagepng($im);
    imagedestroy($im);
}
else {
    echo 'An error occurred.';
}


?>