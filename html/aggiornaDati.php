<?php
require 'strconn.php';
$user=$_REQUEST['user'];
$queryU="SELECT numero FROM utenti WHERE username='{$user}'";
$tabU=$dbconn->query($queryU);
$rowU=$tabU->fetch_array(MYSQLI_NUM);
$nUser=$rowU[0]; // id utente
$queryLP="SELECT LIBRO FROM prenotazioni WHERE UTENTE={$nUser}";
$tabLP=$dbconn->query($queryLP);
while($rowLP=$tabLP->fetch_array(MYSQLI_NUM)){
  $queryLN="SELECT l.codice, l.nCopie-COUNT(p.LIBRO), p.dataR FROM prestiti AS p, libri AS l WHERE l.codice=p.LIBRO AND l.codice={$rowLP[0]} AND p.dataR>CURDATE() GROUP BY l.codice, p.data";
  $tabLN=$dbconn->query($queryLN);
  while($rowLN=$tabLN->fetch_array(MYSQLI_NUM)){
    $queryUP="SELECT COUNT(t.UTENTE) FROM (SELECT p.UTENTE FROM prenotazioni AS p WHERE p.LIBRO={$rowLN[0]} ORDER BY p.dataPren ASC LIMIT {$rowLN[1]}) AS t WHERE t.UTENTE={$nUser}";
    $tabUP=$dbconn->query($queryUP);
    $rowUP=$tabUP->fetch_array(MYSQLI_NUM);
    $ris=$rowUP[0];
    if($ris>0){
      $insert = $dbconn->query("INSERT INTO prestiti (dataP, dataR, LIBRO, UTENTE) VALUES (CURDATE(), ADDDATE(CURDATE(), INTERVAL 30 DAY), {$rowLN[0]}, {$nUser})");
      if($insert){
        $queryDT="DELETE FROM prenotazioni WHERE UTENTE={$nUser} AND LIBRO={$rowLN[0]}";
        $tabDT=$dbconn->query($queryDT);
        echo("Ciao");
      }else{
        echo("ok");
      }
    }

  }
}


 ?>
