<?
$hw = array(200,100);
$sizeoptions = array(100,150,200,250,300,400,500,800);

$test = array_intersect($hw,$sizeoptions);

print_r(count(array_unique($test)));

echo count(array_unique(array(200,100)));


if ( validsize(array(300,100), array(100,150,300)) == true ) { echo 'ok'; }

function validsize($hw,$options) {

    if ( !is_array($hw) || !is_array($options) ) return false;

    $intersect = array_intersect($hw,$options);

    if ( count(array_unique($intersect)) == count(array_unique($hw)) ) {
        return true;
         } else {
        return false;
    }
}




?>
