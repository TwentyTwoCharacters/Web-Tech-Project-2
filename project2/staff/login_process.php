<?php
session_start();


//set up login attempt system
if (!isset($_SESSION['failed_attempts'])) {
    $_SESSION['failed_attempts'] = 0;
}


$username=$_POST['username'];
$password=$_POST['password'];

//validation to reach the 3 login attempt limit 
if ($_SESSION['failed_attempts'] >= 3) {
    echo "Too many failed attempts. You are locked out.";
    exit();
}

if ($username == 'admin' && $password == 'password123') {
    $_SESSION['user'] = $username;

    $_SESSION['failed_attempts'] = 0;// < login attempt reset on successful login 
    
    header('Location: ./manage.php');
    exit();
} else {
    $_SESSION['failed_attempts']++;
    echo "Invalid login. Attempt {$_SESSION['failed_attempts']} of 3. ";
    echo "<a href='../login.php'>Try again</a>";
}


