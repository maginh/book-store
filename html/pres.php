<?php
require 'strconn.php';
session_start();

$t=$_REQUEST['titolo'];
$user=$_SESSION['usr'];

// Prelevare id dell'utente
$queryU="SELECT numero FROM utenti WHERE username='{$user}'";
$tabU=$dbconn->query($queryU);
$rowU=$tabU->fetch_array(MYSQLI_NUM);
$nUser=$rowU[0];

// Prelevare id del libro
$queryL="SELECT codice FROM libri WHERE titolo='{$t}'";
$tabL=$dbconn->query($queryL);
$rowL=$tabL->fetch_array(MYSQLI_NUM);
$nLibro=$rowL[0];

$insert = $dbconn->query("INSERT INTO prestiti (dataP, dataR, flag, LIBRO, UTENTE) VALUES (CURDATE(), ADDDATE(CURDATE(), INTERVAL 30 DAY), 1, {$nLibro}, {$nUser})");
if($insert){
  $queryV="SELECT dataP FROM prestiti WHERE UTENTE={$nUser} AND LIBRO={$nLibro} AND flag=1 AND fNoDelete=1";
  $tabV=$dbconn->query($queryV);
  $rowV=$tabV->fetch_array(MYSQLI_NUM);
  echo($rowV[0]);
}else{
  echo("0");
}



 ?>
