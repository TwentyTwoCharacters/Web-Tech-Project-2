<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata for the webpage -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This page will act as the home page for the website, this page will also be used to give a brief description of the other pages">
    <meta name="keywords" content="Optional Programmers, job opportunities, software developer, IT support technician, programming company, apply for jobs, careers in tech, tech company">
    <meta name="author" content="Lucas Jurgec">
    <title>Enhancments</title>

    <link rel="stylesheet" href="styles/styles.css">

</head>

<?php   include './include_files/header.inc';
        require_once("settings.php");?>

    <section class="entirepage">
    <!-- Main content area -->
    <main>
    <section>
            <h2 class="textcenter">Enhancment 1 </h2>
            <p class="textcenter">
            Control access to manage.php by checking username and password.<br>
            <a href=".\staff\staff_login.php"> Staff Login </a><br><br>
            For this enhancement we created a sql database for username and password validation along with a login_process.php which queries for the user and password on the database (user.sql)
            </p>
            
            <h2 class="textcenter">Enhancment 2 </h2>
            <p class="textcenter">
            Create a manager registration page with server side validation requiring unique username and a password rule, and store this information in a table
            <br><br>
            For this enhancement it utilises the code primarily taken from lab 10 to allow for users to register a new username in the user.sql database once they have logged into the staff page.
            </p>
        

            <h2 class="textcenter">Enhancment 3 </h2>
            <p class="textcenter">
            Have access to the web site disabled for user after three or more invalid login attempts.<br><br>
            For this enhancment if a user inputs a username/ password not on the sql database it gives them 3 attempts before the session code locks them out, however this attempt count can be reset using the debug button found on the login page.
            </p>
    </section>


    </main>
    </section>
   
      <!-- footer content found in footer.inc-->
<?php include './include_files/footer.inc'; ?>

</html>
