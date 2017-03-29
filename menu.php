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
$item->set('name','esimene');
$menu->set('items', $item->parse());
$item->set('name', 'teine');
$menu->add('items', $item->parse());
// kontrollime objekti olemasolu ja sisu
// kui soovime pidevat asendamist, siis set funktsioon add asemel
$main_tmpl->add('menu', $menu->parse());
?>