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
define('LIB_DIR', 'lib/'); //lib kataloogi nime konstant
define('ACTS_DIR', 'acts/'); //acts kataloogi nime konstant

define('DEFAULT_ACT', 'default'); // vaikimisi tegevuse faili nime konstant

// võtame kasutusele vajalikud abifailid
require_once LIB_DIR.'utils.php';
require_once 'db_conf.php'; // loome andmebaasi konfi sisse

//võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';
require_once CLASSES_DIR.'linkobject.php';
require_once CLASSES_DIR.'mysql.php';

// loome vajalikud objektid projekti tööks
$http = new linkobject();
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//echo '<pre>';
//print_r($db);
//echo '</pre>';
?>