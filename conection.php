<?php
    $server = "localhost";
    $database = "imagenperfectadb";
    $username = "root";
    $passwd = "/*-Azulesojos-*""/";

    $con = mysql_connect($server, $username, $passwd, $database);

    if(!$con){
        echo "No exitosa";
    }
    else{
        echo "Exitosa";
    }
?>