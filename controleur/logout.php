<?php
session_start();
$_SESSION['logged-in'] = false;
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
?>