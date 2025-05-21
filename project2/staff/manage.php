<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: .\staff\staff_login.php");
    exit;
}
require_once("../settings.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About us">
    <meta name="keywords" content="HTML5">
    <meta name="author" content="">
    <link rel="stylesheet" href="styles\styles.css">
    <title>About Page</title>
</head>

<?php   include '../include_files/header.inc'; ?>

    <h2>
        Expression of Interest Tools
    </h2>

     <form method="post" action="manage.php">
    <h3>Search EOIs</h3>

    <!-- 1. List all EOIs -->
    <input type="submit" name="list_all" value="List All EOIs"><br><br>

    <!-- 2. List EOIs by Job Ref -->
    Job Reference: <input type="text" name="job_ref">
    <input type="submit" name="search_by_job" value="Search by Job"><br><br>

    <!-- 3. List EOIs by Applicant Name -->
    First Name: <input type="text" name="first_name">
    Last Name: <input type="text" name="last_name">
    <input type="submit" name="search_by_name" value="Search by Name"><br><br>

    <!-- 4. Delete EOIs by Job Ref -->
    Delete EOIs with Job Ref: <input type="text" name="delete_job_ref">
    <input type="submit" name="delete_by_job" value="Delete EOIs"><br><br>

    <!-- 5. Change Status -->
    EOI Number: <input type="text" name="eoi_number">
    New Status:
    <select name="new_status">
      <option value="New">New</option>
      <option value="Current">Current</option>
      <option value="Final">Final</option>
    </select>
    <input type="submit" name="change_status" value="Update Status"><br><br>
  </form>

  <hr>
<?php include '../include_files/footer.inc'; ?>

</html>