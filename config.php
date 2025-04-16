<?php
//sinu andmed
$db_server = 'localhost';
$db_andmebaas = 'sport';
$db_kasutaja = 'matu';
$db_salasona = 'Passw0rd';

$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas,)
    // if(!$yhendus){
    //     die("probleem andmebaasiga!");
    // }
?>