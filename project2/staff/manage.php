<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: .\staff\staff_login.php");
    exit;
}
require_once("./settings.php");

?>