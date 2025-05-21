<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "postcode_db";

$conn_postcode = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn_postcode) {
    die("Connection to postcode DB failed: " . mysqli_connect_error());
}
?>