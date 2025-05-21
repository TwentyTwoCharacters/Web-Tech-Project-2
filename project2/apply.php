<!--This page has a form that allows a potential candidate to register their interest in the advertised
position. HTML5 data validation should be used to check the user’s input.
The form will allow a potential applicant to fill in the following:
Field Format requirement
Job reference number drop down selection including all jobs ref numbers
First name max 20 alpha characters
Last name max 20 alpha characters
Date of birth dd/mm/yyyy
Gender radio inputs grouped using a fieldset and legend
Street Address max 40 characters
Suburb/town max 40 characters
State drop down selection from
VIC,NSW,QLD,NT,WA,SA,TAS,ACT
Postcode exactly 4 digits based on States
Email address validate format with regular expression & patterns
Phone number 8 to 12 digits, or spaces
Required technical list checkbox inputs
Other skills textarea
All inputs should have labels. All form values, except the "Other Skills" textarea are ‘required’ or
have a default value (e.g. select and checkbox inputs). The user should not be able to submit the
form if any of these required fields are blank or incorrectly filled.
Data Submission to Server
The form should have a submit button labelled “Apply”. When this button is clicked the name-
values from the associated form should be sent to the server using the post http method. The
server action address is https://mercury.swin.edu.au/it000000/formtest.php. The server will then
just echo back the name value pairs to the client. While nothing will be stored on the server in
this part of the assignment (we will do this in Part 2) this will allow the form submission to be
tested.
-->

<!--LUKES PAGE-->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Job application form">
    <meta name="author" content="Luke">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Job Application</title>
</head>

<?php   include 'header.inc';
        require_once("settings.php");?>

    <section class="entirepage">
        <section class="pagetop">
            <br>
            <h1 class="applyh1">Job Application Portal</h1>
            <p>This is the job application portal for our company Optional Programmers.</p>
            <p>Please refer to the application below.</p>
        </section>

        <section class="jobform">
           <!--the swinburne form server thingo -->
            <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post">
                <fieldset> 
                    <legend class="appLegend">Job Application</legend>

                    <!-- Applied Job dropbox -->
                    <label for="jobid">Job ID</label><br>
                    <select id="jobid" name="jobid" required>
                        <option value="">Please Select</option>
                        <option value="G05">G05 - IT Support Technician</option>
                        <option value="GD302">GD302 - Software Developer</option>
                    </select>
                </fieldset>

                <br>
                <fieldset>
                    <!--personal details (names + dob + gender)-->
                    <legend class="appLegend">Personal Info</legend>
                    <!--first name -->
                    <label for="firstname">First Name</label><br>
                    <input type="text" id="firstname" name="firstname" pattern="[A-Za-z]+" maxlength="20" required><br><br>

                    <!-- last name -->
                    <label for="lastname">Last Name</label><br>
                    <input type="text" id="lastname" name="lastname" pattern="[A-Za-z]+" maxlength="20" required><br><br>

                    <!-- dob -->
                    <label for="dob">Date of Birth</label><br>
                    <input type="date" id="dob" name="dob" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required><br><br>

                    <!-- we love radio buttons (irrelevant comment :D)-->
                    <fieldset>
                        <legend>Gender</legend>
                        <input type="radio" id="male" name="gender" value="Male" required>
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="Female">
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="Other">
                        <label for="other">Other</label><br>
                        <input type="radio" id="notsay" name="gender" value="Rather not say">
                        <label for="notsay">Rather not say</label>
                    </fieldset>
                </fieldset>

                <br>
                <!--customers home address kinda stalker like tbh-->
                <fieldset>
                    <legend class="appLegend">Address Information</legend>
                    <!-- street address -->
                    <label for="street">Street Address</label><br>
                    <input type="text" id="street" name="street" maxlength="40" required><br><br>

                    <!-- suburb -->
                    <label for="suburb">Suburb/Town</label><br>
                    <input type="text" id="suburb" name="suburb" maxlength="40" required><br><br>

                    <!--postcode OMG IF I COULD USE JAVASCRIPT FOR THIS I WOULD OF LOVED TO CODE THE POSTCODE 
                    AND STATE TO THE AUSPOST DATABASE SO IT VALIDATES IF THE POSTCODE IS IN TYHE CORRECT STATE!!!-->
                    <label for="postcode">Postcode</label><br>
                    <input type="text" id="postcode" name="postcode" pattern="\d{4}" required><br><br>

                    <!-- state selection (victoria on top ong) -->
                    <label for="state">State</label><br>
                    <select id="state" name="state" required>
                        <option value="">Select State</option>
                        <option value="VIC">VIC</option>
                        <option value="NSW">NSW</option>
                        <option value="QLD">QLD</option>
                        <option value="NT">NT</option>
                        <option value="WA">WA</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="ACT">ACT</option>
                    </select>
                </fieldset>

                <br>
                <fieldset>
                    <legend class="appLegend">Contact Info</legend>
                    <!-- phone number (pick up da phone) -->
                    <label for="phone">Phone Number</label><br>
                    <input type="text" id="phone" name="phone" pattern="[\d\s]{8,12}" required><br><br>

                    <!-- email address -->
                    <label for="email">Email Address</label><br>
                    <input type="email" id="email" name="email" required>
                </fieldset>

                <br>
                <fieldset>
                    <legend class="appLegend">Job Related Information</legend>
                    <!-- technical skills -->
                    <p>Technical Skills</p>
                    <input type="checkbox" id="networks" name="skills[]" value="Networks" checked>
                    <label for="networks">Networks</label><br>

                    <input type="checkbox" id="systems" name="skills[]" value="Computer Systems">
                    <label for="systems">Computer Systems</label>

                    <!-- coding skills (i guess you needa be decent in coding for both roles) -->
                    <p>Coding Languages</p>
                    <input type="checkbox" id="html" name="languages[]" value="HTML" checked>
                    <label for="html">HTML</label><br>

                    <input type="checkbox" id="css" name="languages[]" value="CSS">
                    <label for="css">CSS</label><br>

                    <input type="checkbox" id="js" name="languages[]" value="JavaScript">
                    <label for="js">JavaScript</label><br><br>

                    <!-- text area for other skills (holy yap) -->
                    <label for="otherskills">Other Skills</label><br>
                    <textarea id="otherskills" name="otherskills" rows="4" cols="30" placeholder="Write any other skills you may have that will help your application..."></textarea>
                </fieldset>

                <br>
                <!-- applition submit and reset -->
                <input type="submit" value="Apply" class="form-button">
                <input type="reset" value="Reset Application" class="form-button">
            </form>
        </section>
    </section>
 <!-- footer content found in footer.inc-->
<?php include 'footer.inc'; ?>

</html>
