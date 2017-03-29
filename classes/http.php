<?php

/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 29.03.2017
 * Time: 13:45
 */
class http
{ // klassi algus
    // klassi muutujad
    var $vars = []; // http päringute andmed
    var $server = []; // serveri masina andmed
    // klassi meetodid

    // paneme algandmed paika - initsialiseerime neid
    function init(){
        $this->vars = array_merge($_GET, $_POST, $_FILES);
        $this->server = $_SERVER;
    } // init

    // defineerime vajalikud konstandid
    function initCont(){
        $consts = array('REMOTE_ADDR', 'HTTP_HOST', 'PHP_SELF', 'SCRIPT_NAME');
        foreach ($consts as $const){
            if(!defined($const) and isset($this->server[$const])){
                define($const, $this->server[$const]);
            }
        }
    }//initCont

} // klassi lõpp