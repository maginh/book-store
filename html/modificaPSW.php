<?php
  require 'strconn.php';
  session_start();
  $user=$_SESSION['usr'];
  $psw=$_REQUEST['psw'];
  $set = $dbconn->query("UPDATE utenti SET password='{$psw}' WHERE username='{$user}'");
  if($set){
    echo("Modifica avvenuta correttamente!");
  }else{
    echo("Ci spiace, non siamo riusciti ad apportare le modifiche richieste.");
  }







 ?>
