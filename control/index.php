<?php 
ob_start();
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: production/");
}else {
    header("Location: production/login.php");
}
?>