<?php
/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 05.04.2017
 * Time: 9:03
 */
$act = $http->get('act'); // küsime hetkel valitud tegevuse
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php'; // koostame otsitava faili nime
// kui selline fail olemas ja lugemiseks lubatud
if(file_exists($fn) and is_file($fn) and is_readable($fn)){
    // loeme sisu
    require_once $fn;
}else{
    $fn = ACTS_DIR.DEFAULT_ACT.'.php'; // koostame vaikimisi oleva faili nime
    $http->set('act', DEFAULT_ACT); // paneme act väärtuse degault - act=default
    require_once $fn;
}
?>