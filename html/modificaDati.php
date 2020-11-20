<?php
require 'strconn.php';
session_start();
$u=$_SESSION['usr'];
$user=$_REQUEST['user'];
$email=$_REQUEST['email'];
$nome=$_REQUEST['nome'];
$cogn=$_REQUEST['cogn'];
$tel=$_REQUEST['tel'];

$set = $dbconn->query("UPDATE utenti SET username='{$user}', email='{$email}', nome='{$nome}', cognome='{$cogn}', telefono='{$tel}' WHERE username='{$u}'");
if($set){
  echo("Dati modificati correttamente!");
}else{
  echo("Ci spiace, non siamo riusciti ad apportare le modifiche richieste.");
}



 ?>
