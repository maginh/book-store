<?php
require 'strconn.php';
session_start();
$u=$_SESSION['usr'];
$user=$_REQUEST['user'];
$ris="";
$query="SELECT username FROM utenti WHERE username='{$user}'";
$tab=$dbconn->query($query);
$row=$tab->fetch_array(MYSQLI_NUM);
if($u==$row[0]){
  $ris="2";
}else if(!isset($row[0])){
  $ris="0";
}else{
  $ris="1";
}
echo($ris);



 ?>
