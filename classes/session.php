<?php

/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 19.04.2017
 * Time: 8:53
 */
class session { //klassi algus
    // klassi muutujad
    var $sid = false;
    var $vars = array();
    var $http = false;
    var $db = false;
    var $anonymous = true;
    var $timeout = 1800;
} // klassi lõpp