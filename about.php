<!--This page will contain information on the following:
Information HTML element to be used
Your group name - Class time and day A Nested List (Any)
All your student IDs
Your tutor’s name
Members Contribution to this project Definition list (Name, Contribution)
Photo of your group (Group photot) < 300k HTML figure element
Members Interests HTML table (Most have cell or row merged
with a caption)
It could also include group profile, such as programming skills, working experiences,, or
information that is related to your group. This extra information gives you an opportunity to extend
the techniques you apply in your assignment, and could include:
• Demographic information about all of you
• Description of your hometown
• A list of your group members’ favourite books, music, films etc-->

<!--Abhinav's page-->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About us">
    <meta name="keywords" content="HTML5">
    <meta name="author" content="Abhinav Thakur">
    <link rel="stylesheet" href="styles\styles.css">
    <title>About Page</title>
</head>

<?php   include 'header.inc';
        require_once("settings.php");?>

    <section class="entirepage">
        <h1 class="blue-heading">About Us</h1>
        <!--Use Nested Lists-->
        <ul>
            <li>Optional Programmers Friday 10:30 Tutor ~ Nick</li>

        </ul>
        <!--Group photo using html figure element-->
        <figure class="float-right">
            <img src="images/group-photo.jpeg" alt="Group Photo" width="500">
            <figcaption>This is our group photo (Luke, Abhinav, Ali and Lucas from left to right)</figcaption>
        </figure>
        <ul class="right-align">
            <li> Abhinav Thakur 105716205</li>
            <li>Luke Kelly 105912430</li>
            <li>Lucas Jurgec 105923018</li>
            <li>Ali Afzali 106092469</li>
        </ul>
        <h2 class="h2-color">Members Contribution</h2>
        <!--Create a Definition list-->
        <dl>
            <dt>Abhinav Thakur</dt>
            <dd>Designed the about page Contributed to CSS styling. Made sure that the code follows accesibilty rules

            </dd>
            <dt>Luke Kelly</dt>
            <dd>Designed the the apply page. Majorly contributed in CSS formatting. Set up the Github repository</dd>
            <dt>Lucas Jurgec</dt>
            <dd>Created the Optional programmers animation header.Designed the
                home page and set up the Jira project.
            </dd>
            <dt>Ali Afzali</dt>
            <dd>Designed the jobs application page. Helped with CSS styling and tested the code for errors</dd>
        </dl>



        <!--Create a table-->
        <table class="table-file1">
            <caption>Members Interests</caption>
            <thead>
                <tr>
                    <!-- Table Heading for Column 1 -->
                    <th>NAME</th>
                    <!-- Table Heading for Column 2 -->
                    <th>Interest</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Abhinav</td>
                    <td colspan="2">Loves playing sports especially cricket and football. Avoids
                        playing videogames as he gets addicted to them.
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Luke</td>
                    <td colspan="2">Loves playing video games like the Halo series and the Kingdom Come Deliverance
                        Series. </td>
                </tr>
                <tr>
                    <td>Lucas</td>
                    <td colspan="2">Loves playing soccer and watching the Premier league. He also likes reading sci fi
                        novels like the Hunger Games </td>
                </tr>
                <tr>
                    <td>Ali</td>
                    <td colspan="2">He likes to play basketball in his free time and going to the gym. His favourite
                        movie is interstellar. </td>
                </tr>
            </tbody>
        </table>

        <h3>Additional Information</h3>
        <!--Create Description list-->
        <dl>
            <dt>Abhinav Thakur</dt>
            <dd>Abhinav was born in a small and beautiful mountainous village in the Himalayan
                range of India.He only has basic coding experience in html and python but is
                always enthusiastic to learn. He loves listening to all kinds of music and read horror and mystery
                novels. 3
                Idiots
                is one of his favourite films.

            </dd>
            <dt>Luke Kelly</dt>
            <dd>Luke was born and brought up in the beautiful suburb of Bentleigh. He loves beaches
                and surfing is his passion. He has great experience in coding javascript being his expertise.
            </dd>
            <dt>Lucas Jurgec</dt>
            <dd>Lucas was born and brought up in melbourne and so were his parents
                but his grandparents moved to Australia in 1970s from Croatia. His favourite movie
                is ford vs ferari and he is a soccer coach.</dd>
            <dt>Ali Afzali</dt>
            <dd>Ali was born in Afghanistan in the historic city of Ghazni. He is the youngest of 3 siblings and moved
                to Australia in 2023
                to get education in Software development.
            </dd>
        </dl>

    </section>
 <!-- footer content found in footer.inc-->
<?php include 'footer.inc'; ?>

</html>