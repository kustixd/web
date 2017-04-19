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
    var $timeout = 1800; // 30 minutit
    // klassi meetodid
    // konstruktor
    function __construct(&$http, &$db){
        $this->http = &$http;
        $this->db = &$db;
        // võtame sessioni id andmed
        $this->createSession();
        $this->clearSession();
        $this->sid = $http->get('sid');
    }// konstruktori lõpp
    function createSession($user = false){
        // kui kasutaja on anonüümne
        if($user == false){
            // tekitame andmed session tabeli jaoks
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }// kas kasutaja on anonüümne - lõpp
        // unikaalse sessiooni id loomise
        $sid = md5(uniqid(time().mt_rand(1,1000), true));
        // päring sessiaani andmete salvestamiseks andmebaasi
        $sql = 'INSERT INTO session SET '.
            'sid='.fixDb($sid).', '.
            'user_id='.fixDb($user['user_id']).', '.
            'user_data='.fixDb(serialize($user)).', '.
            'login_ip='.fixDb(REMOTE_ADDR).', '.
            'created=NOW()';
        // päring andmebaasi
        $this->db->query($sql);
        // määrame sid ka antud klassi muutujale var $sid
        $this->sid = $sid;
        // paneme antud väärtuse ka veebi - lehtede vahel kasutamiseks
        $this->http->set('sid', $sid);
    }

    // sessiooni tabeli puhastamine
    function clearSessions(){
        $sql = 'DELETE FROM session'.' WHERE '.
            time().' - UNIX_TIMESTAMP(changed) > '.
            $this->timeout;
        $this->db->query($sql);
    }// clearSessions
} // klassi lõpp