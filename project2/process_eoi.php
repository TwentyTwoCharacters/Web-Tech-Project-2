<?php

// block access unless redirected by pressing submit button on apply page
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: apply.php");
    exit();
}

// uses variables in settings.php
require_once("settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

// display if connection failed
if (!$conn ) {
    die("Connection failed: " . mysqli_connect_error());
}

// removes spaces and special characters from inputs
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// get inputs
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

// check box groups
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
$languages = isset($_POST['languages']) ? $_POST['languages'] : [];

$skills_networks = in_array('Networks', $skills) ? 1 : 0;
$skills_computer = in_array('Computer Systems', $skills) ? 1 : 0;
$coding_html = in_array('HTML', $languages) ? 1 : 0;
$coding_css = in_array('CSS', $languages) ? 1 : 0;
$coding_java = in_array('JavaScript', $languages) ? 1 : 0;

// stores the errors
$errors = [];

?>