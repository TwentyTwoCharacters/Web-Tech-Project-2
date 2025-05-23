<!--You need to write a web page with at least 2 position descriptions. Each group will get a job title
posted on Canvas. For the second position, the choice of IT job type is entirely up to you. Why not
write a position for the ideal job you would like to do? this page must contain:
• Hierarchically structured headings of at least 2 levels
• More than one <section>
• An <aside> with appropriate content
• At least one ordered list
• At least one unordered list
• The page should also have an appropriate footer and semantic tags.
Your job descriptions should be concise but as a minimum include :
• Company’s position description reference number (5 alphanumeric characters)
• Position title
• Brief description of the position
• Salary range
• The title of the position to whom the successful applicant will report
• Key responsibilities. A list of the specific tasks that are to be performed
• Required qualifications, skills, knowledge and attributes. These should be divided into
“essential” and “preferable”. These requirements should include such things as
programming languages required, number-of-years of experience required, etc..
The content of the job description should be appropriately structured with headings, sections,
subsections, lists etc. using the appropriate HTML elements-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Explore open IT positions at Optional Programmers">
  <meta name="keywords" content="jobs, IT careers, web development, games development, positions">
  <meta name="author" content="Ali Afzali">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Descriptions - Optional Programmers</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>

<body class="cssbody">

<?php 
  include './include_files/header.inc';
  require_once("settings.php"); 
?>

<main class="entirepage">
  <h2>Available Positions</h2>
  <div class="job-layout">

    <div class="job-content">
      <?php
      $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

      if (!$conn) {
        echo "<p>Database connection failed.</p>";
      } else {
        $query = "SELECT * FROM jobs";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<section>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<article>";
            echo "<p><strong>Reference ID:</strong> " . htmlspecialchars($row['job_ref']) . "<br>";
            echo "<strong>Salary Range:</strong> " . htmlspecialchars($row['salary_range']) . "<br>";
            echo "<strong>Reports To:</strong> " . htmlspecialchars($row['reports_to']) . "</p>";

            echo "<p>" . htmlspecialchars($row['description']) . "</p>";

            echo "<h4>Key Responsibilities</h4><ul>";
            foreach (explode("\n", $row['responsibilities']) as $resp) {
              echo "<li>" . htmlspecialchars($resp) . "</li>";
            }
            echo "</ul>";

            echo "<h4>Qualifications & Skills</h4><ol>";
            echo "<li><strong>Essential:</strong><ul>";
            foreach (explode("\n", $row['essential_skills']) as $skill) {
              echo "<li>" . htmlspecialchars($skill) . "</li>";
            }
            echo "</ul></li>";

            echo "<li><strong>Preferable:</strong><ul>";
            foreach (explode("\n", $row['preferable_skills']) as $skill) {
              echo "<li>" . htmlspecialchars($skill) . "</li>";
            }
            echo "</ul></li></ol>";

            echo "</article></section>";
          }
        } else {
          echo "<p>No jobs found in the database.</p>";
        }

        mysqli_close($conn);
      }
      ?>
    </div>

    <aside>
      <h4>Why Work With Us?</h4>
      <p>At Optional Programmers, we offer flexible hours, remote work opportunities, and a supportive team environment that values growth, learning, and collaboration.</p>
    </aside>

  </div>
</main>

<?php include './include_files/footer.inc'; ?>

</body>
</html>
