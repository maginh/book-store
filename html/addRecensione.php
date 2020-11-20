<?php
require 'strconn.php';
session_start();
$user=$_SESSION['usr'];
$txt=$_REQUEST['testo'];
$titolo=$_REQUEST['titolo'];

$queryU="SELECT numero FROM utenti WHERE username='{$user}'";
$tabU=$dbconn->query($queryU);
$rowU=$tabU->fetch_array(MYSQLI_NUM);
$nUser=$rowU[0];

$queryL="SELECT codice FROM libri WHERE titolo='{$titolo}'";
$tabL=$dbconn->query($queryL);
$rowL=$tabL->fetch_array(MYSQLI_NUM);
$nLibro=$rowL[0];

$query="SELECT * FROM recensioni WHERE UTENTE={$nUser} AND LIBRO={$nLibro}";
$tab=$dbconn->query($query);
if($row=$tab->fetch_array(MYSQLI_NUM)){
  echo("2");
}else{
  $insert = $dbconn->query("INSERT INTO recensioni (testo, LIBRO, UTENTE) VALUES ('{$txt}', {$nLibro}, {$nUser})");
  if($insert){
    echo("1");
  }else{
    echo("0");
  }
}





 ?>
