<?php
/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 15.03.2017
 * Time: 15:25
 */
//degineerime vajalikud konstandid
define('CLASSES_DIR', 'classes/'); //classes kataloogi nime konstant
define('TMPL_DIR', 'tmpl/'); //tmpl kataloogi nime konstant

//võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';

// loome vajalikud objektid projekti tööks
$http = new http();
$http->init();
$http->initCont();
// Testime http objekti tööd
echo REMOTE_ADDR;
?>