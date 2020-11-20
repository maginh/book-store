<?php

$hostname="localhost";
$dbname="my_davinm01";
$username="root";
$password="";
$dbconn=new mysqli($hostname, $username, $password, $dbname);

if($dbconn->connect_error){
  die("<br>Connessione fallita: " . $dbconn->connect_error);
}

 ?>
