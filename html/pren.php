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


$queryC="SELECT * FROM prestiti WHERE LIBRO={$nLibro} AND UTENTE={$nUser} AND fNoDelete=1 AND CURDATE()<dataP";
$tabC=$dbconn->query($queryC);
if($rowC=$tabC->fetch_array(MYSQLI_NUM)){

  echo("1");
}else{

  $query="SELECT numero, dataR FROM prestiti WHERE flag=1 AND fNoDelete=1 AND LIBRO={$nLibro} ORDER BY dataR ASC LIMIT 1";
  $tab=$dbconn->query($query);
  $row=$tab->fetch_array(MYSQLI_NUM);
  $set = $dbconn->query("UPDATE prestiti SET flag=0 WHERE numero={$row[0]}");
  $insert = $dbconn->query("INSERT INTO prestiti (dataP, dataR, flag, LIBRO, UTENTE) VALUES (ADDDATE('{$row[1]}', INTERVAL 1 DAY), ADDDATE('{$row[1]}', INTERVAL 31 DAY), 1, {$nLibro}, {$nUser})");
  if($set && $insert){
    $queryV="SELECT dataP FROM prestiti WHERE UTENTE={$nUser} AND LIBRO={$nLibro} AND flag=1 AND fNoDelete=1";
    $tabV=$dbconn->query($queryV);
    $rowV=$tabV->fetch_array(MYSQLI_NUM);
    echo($rowV[0]);
  }else{
    echo("2");
}

}






 ?>
