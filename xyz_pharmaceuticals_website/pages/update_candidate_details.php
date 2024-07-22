<?php
$docTitle = "Candidate Details";
require_once("docstart.php");
require_once("navlinks.php");
require_once("db_conn.php");


// Include the database connection file
require_once("db_conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check which tab is active and process the corresponding data
  if (isset($_POST['resume-tab'])) {
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
  } elseif (isset($_POST['personal-details-tab'])) {
    // Handle personal details update
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];

    // Update the personal details in the database for the current candidate
    $candidate_id = $_SESSION['candidate_id'];
    $update_personal_details_query = "UPDATE candidates SET fullname = '$fullname', address = '$address' WHERE id = $candidate_id";
    $conn->query($update_personal_details_query);
  } elseif (isset($_POST['education-details-tab'])) {
    // Handle education details update
    $university = $_POST['university'];
    $degree = $_POST['degree'];

    // Update the education details in the database for the current candidate
    $candidate_id = $_SESSION['candidate_id'];
    $update_education_details_query = "UPDATE candidates SET university = '$university', degree = '$degree' WHERE id = $candidate_id";
    $conn->query($update_education_details_query);
  }
}

// Close the database connection
$conn->close();
?>

<?php require_once("docend.php"); ?>
