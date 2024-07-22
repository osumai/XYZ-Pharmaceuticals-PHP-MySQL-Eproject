<?php
$docTitle = "Candidate Resume";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Handle resume update
  if (isset($_FILES['resume'])) {
    // Retrieve the uploaded resume file
    $resume = $_FILES['resume']['name'];
    $resume_tmp = $_FILES['resume']['tmp_name'];

    // Set the target directory to store the resume file
    $target_dir = "resume_uploads/";
    // Generate a unique file name for the resume
    $resume_file = uniqid() . "_" . $resume;
    $target_path = $target_dir . $resume_file;

    // Move the uploaded resume file to the target directory
    if (move_uploaded_file($resume_tmp, $target_path)) {
      // Update the resume file path in the database for the current candidate
      $candidate_id = $_SESSION['candidate_id'];
      $update_resume_query = "UPDATE candidates SET resume = '$resume_file' WHERE id = $candidate_id";
      $conn->query($update_resume_query);
    }
  }
}

// Close the database connection
$conn->close();
?>

<!-- Include the resume section HTML code -->
<div id="resume-section">
  <!-- Resume form -->
  <form action="create_candidate_account.php" method="POST" enctype="multipart/form-data">
    <label for="resume">Upload Resume:</label>
    <input type="file" name="resume" id="resume">
    <button type="submit" name="resume-tab">Save</button>
  </form>

  <!-- Display current resume if available -->
  <?php
  // Get the current candidate's resume file path
  $candidate_id = $_SESSION['candidate_id'];
  $resume_query = "SELECT resume FROM candidates WHERE id = $candidate_id";
  $result = $conn->query($resume_query);

  if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $resume_file = $row['resume'];
    if (!empty($resume_file)) {
      // Display the resume file download link
      echo '<a href="resume_uploads/' . $resume_file . '">Download Resume</a>';
    }
  }
  ?>
</div>


<?php require_once("docend.php"); ?>
