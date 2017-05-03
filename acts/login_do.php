<?php
/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 03.05.2017
 * Time: 9:40
 */
// võtame kätte vormi poolt edastatud andmed
$username = $http->get('kasutaja');
$passwd = $http->get('parool');

//koostame päringu kasutaja kontrollimiseks andmebaasis
$sql = 'SELECT * from user'.
    ' where username='.fixDb($username).
    ' AND password='.fixDb(md5($passwd));
$res = $db->getArray($sql);

// Teeme päringu tulemuse kontrolli
if($res == false){
    // siis tuleb kasutaja suunata tagasi sisselogimisvormi
}else{
    //Siis tuleb avada kasutaja sessioon
    $sess->createSession($res[0]);
    // Tuleb suunata kasutajad pealehele
    //Kui ma väljastan kasutajaandmed sessiooni kontrolliks
    $http->redirect();
}