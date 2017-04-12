<?php
/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 05.04.2017
 * Time: 9:18
 */
// lehe id saamine ja teisendamine / andmebaasis BIGINT
$page_id = $http->get('page_id');
// sql lause lehe sisu otsimiseks vastavalt id-le
$sql = 'select * from content where '.'content_id='.fixDb($page_id);
// saadame päringu andmebaasi sisu saamiseks
$res = $db->getArray($sql);

if($res === false) {
    $sql = 'select * from content where '.'is_first_page='.fixDb(1);
    $res = $db->getArray($sql);
}
if($res !== false){
    $page = $res[0];
    $http->set('page_id', $page['content_id']);
    $main_tmpl->set('content', $page['content']);
}
?>