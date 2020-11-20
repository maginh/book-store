<?php
require 'strconn.php';
session_start();
$user=$_SESSION['usr'];
$titolo=$_REQUEST['titolo'];

$queryU="SELECT numero FROM utenti WHERE username='{$user}'";
$tabU=$dbconn->query($queryU);
$rowU=$tabU->fetch_array(MYSQLI_NUM);
$nUser=$rowU[0];

// Prelevare id del libro
$queryL="SELECT codice FROM libri WHERE titolo='{$titolo}'";
$tabL=$dbconn->query($queryL);
$rowL=$tabL->fetch_array(MYSQLI_NUM);
$nLibro=$rowL[0];
$query="SELECT dataP FROM prestiti WHERE LIBRO={$nLibro} && UTENTE={$nUser} AND fNoDelete=1";
$tab=$dbconn->query($query);
$row=$tab->fetch_array();
$set = $dbconn->query("UPDATE prestiti SET fNoDelete=0 WHERE LIBRO={$nLibro} AND UTENTE={$nUser} AND fNoDelete=1");
if($set){
  $querySE="SELECT numero FROM prestiti WHERE dataR=ADDDATE('{$row[0]}', INTERVAL -1 DAY) AND fNoDelete=1 AND LIBRO={$nLibro} AND flag=0 ORDER BY numero LIMIT 1";
  $tabSE=$dbconn->query($querySE);
  if($rowSE=$tabSE->fetch_array(MYSQLI_NUM)){
  	$up = $dbconn->query("UPDATE prestiti SET flag=1 WHERE numero={$rowSE[0]}");
    if($up){
    	echo("<script>alert('Prestito eliminato con successo');window.location.href='profilo.php';</script>");
  	}else{
    	echo("<script>alert('Non siamo riusciti ad eliminare il libro come richiesto, ci spiace.');window.location.href='profilo.php';</script>");
  	}
  }else{
  	echo("<script>alert('Prestito eliminato con successo');window.location.href='profilo.php';</script>");
  }

}else{
  echo("<script>alert('Non siamo riusciti ad eliminare il libro come richiesto, ci spiace.');window.location.href='profilo.php';</script>");
}



 ?>
