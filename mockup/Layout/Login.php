<?php
session_start();
$_SESSION['member']="Member";
echo "<script type='text/javascript'>document.location.href='index.php';</script>";
?>