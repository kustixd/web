<?php
/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 22.03.2017
 * Time: 15:26
 */
// loome menüü template objektid
$menu = new template('menu.menu');
$item = new template('menu.item');
//lisame  sisu
// menüü sql lause
$sql = 'SELECT content_id, title FROM content WHERE '.'parent_id='.fixDb(0).' AND show_in_menu='.fixDb(1);
// saame päringu tulemusena
$res = $db->getArray($sql);
// kontrollime tulemuse sisu
if($res != false){
    foreach ($res as $page) {
        // nimetame menüüs väljastatava elemendi
        $item->set('name', $page['title']);
        // loome antud menüü elemendile lingi
        $link = $http->getLink(array('page_id'=>$page['content_id']));
        // lisame antud link menüüsse
        $item->set('link', $link);
        // lisame valmis link menüü objekti sisse
        $menu->add('items', $item->parse());
    }
}
// sisse logimine
if(USER_ID == ROLE_NONE){
    $item->set('name', tr('Logi sisse'));
    $link = $http->getLink(array('act'=>'login'));
    $item->set('link', $link);
    $menu->add('items', $item->parse());
}
// välja logimine
if(USER_ID != ROLE_NONE){
    $item->set('name', tr('Logi välja'));
    $link = $http->getLink(array('act'=>'logout'));
    $item->set('link', $link);
    $menu->add('items', $item->parse());
}
// kontrollime objekti olemasolu ja sisu
// kui soovime pidevat asendamist, siis set funktsioon add asemel
$main_tmpl->add('menu', $menu->parse());

?>