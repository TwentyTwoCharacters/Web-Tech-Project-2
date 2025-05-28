<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: ./staff/staff_login.php");
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
    <link rel="stylesheet" href="styles/styles.css">
    <title>About Page</title>
</head>

<section class="entirepage">
    <section class="pagetop">
        <br>
        <h1 class="applyh1">Manager Tools</h1>
        <p>This is the management portal for our company Optional Programmers.</p>
        <p>Please refer to the tools below.</p>
    </section>
<form method="post" action="manage.php"> 
    Username: <input type="text" name="username" required><br>
    Password: <input type="text" name="password" required><br>
    <input type="submit" name="add_user" value="Register New User"><br><br>
</form>

<?php 
if (isset($_POST['add_user'])) {
    $add_username = trim($_POST['username']);
    $add_password = trim($_POST['password']);

    $query = "INSERT INTO user (username, password) VALUES ('$add_username', '$add_password')";
    
    if (mysqli_query($conn, $query)) {
        echo "<p>User '$add_username' registered successfully.</p>";
        // Optional: redirect
        // header("Location: manage.php");
        // exit();
    } else {
        echo "<p>Error adding user: " . mysqli_error($conn) . "</p>";
    }
}
?>


    <form method="post" action="manage.php">
        <input type="submit" name="list_all" value="List All EOIs"><br><br>

        Job Reference: <input type="text" name="job_ref">
        <input type="submit" name="search_by_job" value="Search by Job"><br><br>

        First Name: <input type="text" name="first_name">
        Last Name: <input type="text" name="last_name">
        <input type="submit" name="search_by_name" value="Search by Name"><br><br>

        Delete EOIs with Job Ref: <input type="text" name="delete_job_ref">
        <input type="submit" name="delete_by_job" value="Delete EOIs"><br><br>

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

<!-- EOI SEARCH SECTION-->
<?php 
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 1. list all
if (isset($_POST['list_all'])){
    $query = "SELECT * FROM eoi";
    displayEOIs($conn, $query);
}

// 2. Search by Job Reference
if (isset($_POST['search_by_job'])) {
    $job_ref = trim($_POST['job_ref']);
    if ($job_ref != "") {
        $query = "SELECT * FROM eoi WHERE jobid = '$job_ref'";
        displayEOIs($conn, $query);
    } else {
        echo "<p>Please enter a job reference.</p>";
    }
}

// 3. search by name with conditions (thanks w3School)
if (isset($_POST['search_by_name'])) {
    $fname = trim($_POST['first_name']);
    $lname = trim($_POST['last_name']);

    if ($fname || $lname) {
        $where = [];
        if ($fname) $where[] = "firstname = '$fname'";
        if ($lname) $where[] = "lastname = '$lname'";
        
        $query = "SELECT * FROM eoi WHERE " . implode(" AND ", $where);
        displayEOIs($conn, $query);
    } else {
        echo "<p>Please enter at least one name field.</p>";
    }
}


// 4. delete Eoi by job reff
if (isset($_POST['delete_by_job'])) {
    $delete_ref = trim($_POST['delete_job_ref']);
    if ($delete_ref != "") {
        $sql = "DELETE FROM eoi WHERE jobid = '$delete_ref'";
        if (mysqli_query($conn, $sql)) {
            echo "<p>EOIs for job $delete_ref deleted.</p>";
        } else {
            echo "<p>Error deleting EOIs: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Please enter a job reference to delete.</p>";
    }
}

// 5. change EOI status
if (isset($_POST['change_status'])) {
    $eoi_number = trim($_POST['eoi_number']);
    $new_status = trim($_POST['new_status']);

    if ($eoi_number != "" && $new_status != "") {
        $sql = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = $eoi_number";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Status updated for EOI #$eoi_number.</p>";
        } else {
            echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Please enter both EOI number and status.</p>";
    }
}

// Display EOi functions (ripped from lab09 display format)
function displayEOIs($conn, $query) {
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'><tr>
            <th>EOI Number</th><th>Job Ref</th><th>Name</th><th>Address</th>
            <th>Email</th><th>Phone</th><th>Status</th>
        </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['EOInumber']}</td>
                <td>{$row['jobid']}</td>
                <td>{$row['firstname']} {$row['lastname']}</td>
                <td>{$row['street']}, {$row['suburb']}, {$row['state']} {$row['postcode']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['status']}</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }
}

mysqli_close($conn);
?>
</section>
</html>
