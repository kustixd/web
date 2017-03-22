<?php

/**
 * Created by PhpStorm.
 * User: KustixD
 * Date: 22.03.2017
 * Time: 12:11
 */
class template
{//klassi algus
    //template klassi omadused - muutujad
    var $file = ''; // html malli faili nimi
    var $content = false; // html malli faili sisu
    var $vars = array(); // html vaade sisu - reaalsed väärtused
    // klassi tegevused - meetodid - funktsioonid

    // klassi konstruktor
    function __construct($f){
        $this->file = $f; // määrame html malli faili nime
        $this->loadFile(); // loeme määratud failist sisu
    }//konstrktor

    // html faili lugemine
    function loadFile(){
        $f = $this->file; //lokaalne asendus
        // kontrollime mallide kausta olemasolu
        if(!is_dir(TMPL_DIR)){
            echo 'Kataloogi '.TMPL_DIR.' ei ole leitud</ br>';
            exit;
        }
        // kui fail on olemas ja lugemiseks sobiv
        if(file_exists($f) and is_file($f) and is_readable($f)){
            // loeme faili sisu
            $this->readFile($f);
        }

        // lisame TMPL_DIR  kasutusele
        $f = TMPL_DIR.$this->file; // veel üks lokaalne asendus
        if(file_exists($f) and is_file($f) and is_readable($f)){
            // loeme faili sisu
            $this->readFile($f);
        }

        // lisame .html laienduse kasutusele
        $f = TMPL_DIR.$this->file.'.html'; // veel üks lokaalne asendus
        if(file_exists($f) and is_file($f) and is_readable($f)){
            // loeme faili sisu
            $this->readFile($f);
        }
        // kui sisu polnud võimalik lugeda
        if($this->content === false){
            echo 'Ei suutnud lugeda faili '.$this->file.'<br />';
        }
    }// load file

    // loeme sisu html failist
    function readFile($f){
        $this->content = file_get_contents($f);
    }//readFile

    //koostame paarid malli elemendi nimi => reaalne_väärtus
    function set($name, $val){
        $this->vars[$name] = $val;
    }//set

    //htmli täitmine reaalse sisuga
    function parse(){
        $str = $this->content; //lokaalne asendus
        // vaatame malli elemendi massiivi
        foreach ($this->vars as $name=>$val){
            $str = str_replace('{'.$name.'}', $val, $str);
            //echo $str;
        }
        return $str;
    }//parse

}//klassi lõpp
?>