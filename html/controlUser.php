<?php
require 'strconn.php';
$user=$_REQUEST['user'];
$query="SELECT * FROM utenti WHERE username='{$user}'";
$tab=$dbconn->query($query);
if($row=$tab->fetch_array(MYSQLI_NUM)){
  echo("1");
}else{
  echo("0");
}



 ?>
