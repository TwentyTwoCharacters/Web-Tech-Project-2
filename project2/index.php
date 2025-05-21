<!--This page should contain appropriate title, a description and graphic related to the company (with
company name, and logo). It is up to you to make up the details of the company that is advertising
the jobs. It should contain a menu that links to the other pages on your Web site. This same menu
should be in every page of your website with an email link to the companies email in the format of
info@companyname.com.au
In the footer include the link to your Jira Project (Don't forget to give access to your tutor)-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata for the webpage -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Home Page">
    <meta name="keywords" content="HTML5, tags">
    <meta name="author" content="Lucas Jurgec">
    <title>Optional Programmers Home Page</title>

    <link rel="stylesheet" href="styles/styles.css">

</head>

<?php   include './include_files/header.inc';
        require_once("settings.php");?>

    <section class="entirepage">
    <!-- Main content area -->
    <main>
        <!-- Section about the company -->
        <section>
            <p class="textcenter">
                Optional Programmers is a new buisness looking at developing high end programs for consumers accross the globe.
                <br><br>
                We take pride in our ability to meet customer expectations and deliver innovative, and reliable solutions
                <br><br>
                If you would like to learn move about us click <a href="about.html">here</a>
            </p>
        </section>

        <!-- Section listing job openings -->
        <section>
            <h2 class="textcenter">Job Availabilities</h2>
            <p class="textcenter">
                At Optional Programmers we have multiple<br>
                job openings, these include:
            </p>
             <!-- Centered job list -->
            <div class="center-container">
                <ul id="listalign">
                    <li>Software Developer</li>
                    <li>IT Support Technician</li>
                </ul>
            </div>

            <p class="textcenter">
                If you would like to learn more about<br>
                what each role involes click <a href="jobs.html">here</a><br><br>
                If you would like to apply for one or more<br>
                of the postions above click <a href="apply.html">here</a>
            </p>
        </section>
    </main>
    </section>
   
      <!-- footer content found in footer.inc-->
<?php include './include_files/footer.inc'; ?>

</html>