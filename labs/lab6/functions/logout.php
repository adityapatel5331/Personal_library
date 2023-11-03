<?php
session_start();
unset($_SESSION['username']);
$username = '';

header("Location: index.php");
exit();
?>