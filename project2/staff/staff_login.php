<!-- login.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Staff Login</title>
</head>
<body>
  <h2>Staff Login</h2>
  <form method="post" action="login_process.php">
    <label>Username:
      <input type="text" name="username" required>
    </label><br><br>
    <label>Password:
      <input type="password" name="password" required>
     </label><br><br>
    <input type="submit" value="Login">
  </form>

<form method="post" action="staff_login.php">
  <input type="submit" name="end_session" value="(Debug) end session"><br><br>
  </form>
  



</body>
</html>

<?php
if (isset($_POST['end_session'])){
session_start();
session_destroy();
}
?>