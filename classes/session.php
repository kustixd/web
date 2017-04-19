<?php

/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 19.04.2017
 * Time: 8:53
 */
class session { //klassi algus
    // klassi muutujad
    var $sid = false; //sessioni id
    var $vars = array(); // sessiooni ajal tekkivad andmed
    var $http = false; // objekt veebiandmete kasutamiseks
    var $db = false; // objekt andmebaasi kasutamiseks
    // kui anonüümne sisselogimine pole lubatud siis $anyonymous = false;
    var $anonymous = true; //

    // klassi meetodid
    // konstruktor
    function __construct(){
        $this->http = &$http;
        $this->db = &$db;
    }// konstruktori lõpp
} // klassi lõpp