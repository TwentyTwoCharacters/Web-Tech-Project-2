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

// checking for errors in inputs

// checks job id field
if (empty($jobid)) {
    $errors[] = "Job ID is required";
}

// checks first name field
if (empty($firstname) || !preg_match("/^[a-zA-Z]{1,20}$/", $firstname)) {
    $errors[] = "First name is required and must be max 20 characters long.";
}
// checks last name field
if (empty($lastname) || !preg_match("/^[a-zA-Z]{1,20}$/", $lastname)) {
    $errors[] = "Last name is required and must be max 20 characters long.";
}

// checks date of birth field
if (empty($dob) || !preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)) {
    $errors[] = "Date of Birth must be in DD/MM/YYYY format.";
} else { // also checking the date but will check if the date inputted is a real date
    list($day, $month, $year) = explode('/', $dob);
    if (!checkdate((int)$month, (int)$day, (int)$year)) {
        $errors[] = "Date of Birth is not a valid date.";
    }
}

// checks if gender was inputted
if (empty($gender)) {
    $errors[] = "Gender is required.";
}

// checks street field
if (empty($street) || !preg_match("/^{1,40}$/", $street)) {
    $errors[] = "Street name and number is required and must be max 40 characters long.";
}

// checks suburb field
if (empty($suburb) || !preg_match("/^{1,40}$/", $suburb)) {
    $errors[] = "Suburb name is required and must be max 40 characters long.";
}

// checks postcode is exactly 4 digits long
if (empty($postcode) || !preg_match("/^{4}$/", $postcode)) {
    $errors[] = "Postcode is required and must be 4 digits long.";
}

// checks state field
if (empty($state)) || !in_array($state, ["VIC","NSW","QLD","NT","WA","SA","TAS","ACT"]) {
    $errors[] = "Invalid state.";
}

// checks phone number field
if (empty($phone) || !preg_match("/^{8,12}$/", $phone)) {
    $errors[] = "Phone number is required and must be 8-12 digits long";
}

// checks email field
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email is required and must be in a valid format, i.e user@example.com";
}

// display errors
if (!empty($errors)) {
    echo "<h2>Form Submission Error</h2><ul>";
    foreach ($errors as $err) echo "<li>$err</li>";
    echo "</ul><p><a href='apply.php'>Go Back</a></p>";
    exit();
}

// will store if a resume was uploaded, tried to see if I could store a file but it wouldn't work well
$resume_uploaded = 0;

if (isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0) {
    $resume_uploaded = 1;
} 

// inserting data
$connp = $conn->prepare("
    INSERT INTO eoi (
    jobid, firstname, lastname, dob, gender,
    street, suburb, postcode, state,
    phone, email,
    skills_networks, skills_computer,
    codinglang_html, codinglang_css, codinglang_java,
    otherskills,
    resume_file
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

// binds the ? to the data type
$connp->bind_param("ssssssssssiiiiisi",
    $jobid, $firstname, $lastname, $dob, $gender,
    $street, $suburb, $postcode, $state,
    $phone, $email,
    $skills_networks, $skills_computer,
    $codinglang_html, $codinglang_css, $codinglang_java,
    $otherskills,
    $resume_file
);

// displays a message on if the data was submitted or not
if ($connp->execute()) {
    $eoi_id = $connp->insert_id;
    echo "<h2>Application Submitted Successfully</h2>";
    echo "<p>Your EOI Number is <strong>$eoi_id</strong>.</p>";
} else {
    echo "<p>Error submitting application. Please try again.</p>";
}

$connp->close();
$conn->close();

?>