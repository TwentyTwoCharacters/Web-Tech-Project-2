<?php
$host = "localhost";
$user = "root";
$pwd = "";
$sql_db = "eoi"; // Replace with your actual DB name


$conn = mysqli_connect($host,$user,$pwd,$sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

