<?php
session_start();
session_destroy();
echo "<script>alert('Logout effettuato');</script>";
header("location: index.php");
?>
