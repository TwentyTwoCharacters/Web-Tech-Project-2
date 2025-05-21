<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

if ($username == 'admin' && $password == 'password123'){
    $_SESSION['user'] = $username;
    header('Location: .\staff\manage.php');
} else {
    echo "Invalid login. <a href='./staff/staff_login.php'> Try again</a>";
}
?>
