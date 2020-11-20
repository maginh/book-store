<?php
require 'strconn.php';
$user=$_REQUEST['user'];
$psw=$_REQUEST['psw'];
$email=$_REQUEST['email'];
$nome=$_REQUEST['nome'];
$cognome=$_REQUEST['cognome'];
$tel=$_REQUEST['tel'];
$insert = $dbconn->query("INSERT INTO utenti (username, password, email, nome, cognome, telefono) VALUES ('{$user}', '{$psw}', '{$email}', '{$nome}', '{$cognome}', {$tel})");
if($insert){
  echo("1");
}else{
  echo("0");
}


 ?>
