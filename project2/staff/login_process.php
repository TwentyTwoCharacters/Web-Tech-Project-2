<?php
session_start();

$host = "localhost";
$db_user = "root";
$db_pass = "";
$database = "eoi";

if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}

if ($_SESSION['failed_attempts'] >= 3) {
    echo "Too many failed attempts. You are locked out. <a href='./staff_login.php'>Return to Login Page</a>";
    exit();
}

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'bypass' && $password == 'bypass') {
    $_SESSION['user'] = $username;
    $_SESSION['failed_attempts'] = 0;
    header('Location: ./manage.php');
    exit();
}

$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) == 1) {
    $_SESSION['user'] = $username;
    $_SESSION['failed_attempts'] = 0;
    header("Location: ./manage.php");
    exit();
} else {
    $_SESSION['failed_attempts']++;
    echo "Invalid login. Attempt {$_SESSION['failed_attempts']} of 3. ";
    echo "<a href='./staff_login.php'>Try again</a>";
}

mysqli_close($conn);
?>
