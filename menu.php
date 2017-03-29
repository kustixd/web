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
$menu->set('name', $item->parse());
$item->set('name', 'teine');
$menu->add('name', $item->parse());
// kontrollime objekti olemasolu ja sisu
echo '<pre>';
print_r($menu);
print_r($item);
echo '<pre>';
?>