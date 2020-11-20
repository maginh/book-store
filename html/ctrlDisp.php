<?php
require 'strconn.php';
session_start();
$user=$_SESSION['usr'];
$queryN="SELECT numero FROM utenti WHERE username='{$user}'";
$tabN=$dbconn->query($queryN);
$rowN=$tabN->fetch_array(MYSQLI_NUM);
$userN=$rowN[0];
//echo($user);
$titolo=$_REQUEST['titolo'];
$query="SELECT l.nCopie-COUNT(p.LIBRO), l.codice FROM libri AS l LEFT JOIN prestiti AS p ON l.codice=p.LIBRO AND CURDATE()<p.dataR AND fNoDelete=1 WHERE l.titolo='{$titolo}'  GROUP BY l.codice";
$tab=$dbconn->query($query);
$row=$tab->fetch_array(MYSQLI_NUM);
if($row[0]>0){
  $l=$row[1];
  //echo($userN);
  //echo($l);
  $queryC="SELECT * FROM prestiti WHERE LIBRO={$l} AND UTENTE={$userN} AND fNoDelete=1 AND CURDATE() BETWEEN dataP AND dataR";
  //echo($queryC);
  $tabC=$dbconn->query($queryC);
  if($rowC=$tabC->fetch_array(MYSQLI_NUM)){
    echo("1"); // l'utente è gia in possesso del libro
  }else{
    // inizio richiesta di prestito
    echo("Questo libro è disponibile!");
  }
}else{
  $ll=$row[1];
  $queryCC="SELECT * FROM prestiti WHERE LIBRO={$ll} AND UTENTE={$userN} AND fNoDelete=1 AND CURDATE() BETWEEN dataP AND dataR";
  $tabCC=$dbconn->query($queryCC);
  if($rowCC=$tabCC->fetch_array(MYSQLI_NUM)){
    echo("1"); // l'utente è gia in possesso del libro
  }else{
    echo("0");
  }
}

 ?>
