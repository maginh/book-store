<?php
  require 'strconn.php';
  $nfile=$_REQUEST['file'];
  $file='uploads/';
  $file.=$nfile;
  $filename='uploads/';
  $filename.=$nfile;
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="'.$filename.'"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);


 ?>
