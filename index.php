<?php
/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 15.03.2017
 * Time: 13:08
 */
//votame konfiguratsiooni kasutusele
require_once 'conf.php';
//pealehe sisu
echo '<h1>Veebiprogrammeerimise esileht </h1>';
// valmistame peatemplate objekti.
$main_tmpl = new template('main');
// valmistame paarid malli element => väärtus
$main_tmpl->set('user', 'Kasutajanimi');
$main_tmpl->set('title', 'Pealeht');
$main_tmpl->set('lang_bar', 'Keeleriba');
$main_tmpl->set('menu', 'Lehe peamenüü');
// kutsume menüü tööle testimiseks
require_once 'menu.php';
// tõstsime vaikimisi väljundi default tegevuse sisse
require_once 'act.php';
$main_tmpl->set('site_title', 'Veebiprogrammeerimise kursus');
// kontrollin antud objekti sisu
echo $main_tmpl->parse();

?>