<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}

require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn ) {
    die("Connection failed: " . mysqli_connect_error());
}

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$jobid = clean_input($_POST['jobid']);
$firstname = clean_input($_POST['firstname']);
$lastname = clean_input($_POST['lastname']);
$dob = clean_input($_POST['dob']);
$gender = isset($_POST['gender']) ? clean_input($_POST['gender']) : '';

$street = clean_input($_POST['street']);
$suburb = clean_input($_POST['suburb']);
$postcode = clean_input($_POST['postcode']);
$state = clean_input($_POST['state'])

$phone = clean_input($_POST['phone']);
$email = clean_input($_POST['email']);

$otherskills = clean_input($_POST['otherskills']);

?>