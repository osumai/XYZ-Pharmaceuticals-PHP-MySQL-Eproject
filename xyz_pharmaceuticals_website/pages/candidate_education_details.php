<?php
// Include the database connection file
require_once("db_conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Handle education details update
  $university = $_POST['university'];
  $degree = $_POST['degree'];

  // Update the education details in the database for the current candidate
  $candidate_id = $_SESSION['candidate_id'];
  $update_education_details_query = "UPDATE candidates SET university = '$university', degree = '$degree' WHERE id = $candidate_id";
  $conn->query($update_education_details_query);
}

// Close the database connection
$conn->close();
?>

<!-- Include the education details section HTML code -->
<div id="education-details-section">
  <!-- Education details form -->
  <form action="create_candidate_account.php" method="POST">
    <label for="university">University:</label>
    <input type="text" name="university" id="university" value="<?php echo $university_from_database; ?>">
    <label for="degree">Degree:</label>
    <input type="text" name="degree" id="degree" value="<?php echo $degree_from_database; ?>">
    <button type="submit" name="education-details-tab">Save</button>
  </form>

  <!-- Display current education details -->
  <p>University: <?php echo $university_from_database; ?></p>
  <p>Degree: <?php echo $degree_from_database; ?></p>
</div>
