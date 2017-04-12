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

define('DEFAULT_LANG', 'et'); // default keel

//võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';
require_once CLASSES_DIR.'linkobject.php';
require_once CLASSES_DIR.'mysql.php';

// loome vajalikud objektid projekti tööks
$http = new linkobject();
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// keele tugi
// lehe keeled
$siteLangs = array(
    'et'=>'estonian',
    'en'=>'english',
    'ru'=>'russian'
);
// lehe id saamine url-ist
$lang_id = $http->get('lang_id');
if(!isset($siteLangs[$lang_id])) {
    //kui antud keelt ei toetata siis...
    $lang_id = DEFAULT_LANG;
    $http->set('lang_id', $lang_id);
}
define('LANG_ID', $lang_id);
?>