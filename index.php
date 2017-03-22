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
// kontrollin antud objekti sisu
echo '<pre>';
print_r($main_tmpl);
echo '</pre>';
?>