<?php

/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 05.04.2017
 * Time: 10:29
 */
class mysql { // klassi algus
    // klassi omadused
    var $conn = false;  // ühendus andmebaasiserveriga
    var $host = false;  // andmebaasi serveri host
    var $user = false;  // andmebaasi serveri kasutaja
    var $pass = false;  // andmebaasi serveri parool
    var $dbname = false;// andmebaasi serveri andmebaas

    // klassi tegevused
    function __construct($h, $u, $p, $dn){
        $this->host = $h;
        $this->user = $u;
        $this->pass = $p;
        $this->dbname = $dn;
        $this->connect();
    }


    function connect(){
        $this->conn = mysqli_connect($this->conn,$this->user,$this->pass,$this->dbname);
        if(mysqli_connect_error()){
            echo 'Viga andmebaasiserveriga ühenduses<br>';
            exit;
        }
    }// connect

    //päringu testimine
    function query($sql){
        $res = mysqli_connect($this->conn, $sql);
        if($res == false){
            echo 'Viga päringus!<br>';
            echo '<b>'.$sql.'</b><br>';
            echo mysqli_error($this->conn).'<br>';
            exit;
        }
        return $res;
    } // query
} // klassi lõpp
?>