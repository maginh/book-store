<?php
require 'strconn.php';
session_start();
$user=$_REQUEST['user'];
$psw=$_REQUEST['psw'];
$query="SELECT username FROM utenti WHERE username='{$user}' AND password='{$psw}'";
$tab=$dbconn->query($query);
$row=$tab->fetch_array(MYSQLI_NUM);
$usr=$row[0];
$_SESSION['usr']=$usr;
if(isset($_SESSION['usr'])){
  echo("1");
}else{
  echo("0");
}



 ?>
