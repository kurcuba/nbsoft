<?php
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    $dirPath = 'C:\xampp\htdocs\zadatak4\dir';
    
    $files = array();
    $files = scaner($dirPath);
    pre_r($files);

    function scaner($dir){
       return array_values(array_diff(scandir($dir), array('.','..')));
    }

?>