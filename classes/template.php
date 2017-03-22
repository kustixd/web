<?php

/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 22.03.2017
 * Time: 12:11
 */
class template
{//klassi algus
    //template klassi omadused - muutujad
    var $file = ''; // html malli faili nimi
    var $content = false; // html malli faili sisu
    var $vars = array(); // html vaade sisu - reaalsed väärtused
    // klassi tegevused - meetodid - funktsioonid
    // loeme sisu html failist
    function readFile($f){
        $this->content = file_get_contents($f);
    }//readFile
}//klassi lõpp
?>