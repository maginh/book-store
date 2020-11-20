<?php
require 'strconn.php';
session_start();
$user=$_SESSION['usr'];
$psw=$_REQUEST['psw'];
$query="SELECT * FROM utenti WHERE password='{$psw}' AND username='{$user}'";
$tab=$dbconn->query($query);
if($row=$tab->fetch_array(MYSQLI_NUM)){
  echo("1");
}else{
  echo("0");
}

 ?>
