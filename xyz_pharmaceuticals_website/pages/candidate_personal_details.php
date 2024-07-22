<?php
$docTitle = "Candidate Login";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Handle personal details update
  $fullname = $_POST['fullname'];
  $address = $_POST['address'];

  // Update the personal details in the database for the current candidate
  $candidate_id = $_SESSION['candidate_id'];
  $update_personal_details_query = "UPDATE candidates SET fullname = '$fullname', address = '$address' WHERE id = $candidate_id";
  $conn->query($update_personal_details_query);
}

// Close the database connection
$conn->close();
?>

<!-- Include the personal details section HTML code -->
<div id="personal-details-section">
  <!-- Personal details form -->
  <form action="create_candidate_account.php" method="POST">
    <label for="fullname">Full Name:</label>
    <input type="text" name="fullname" id="fullname" value="<?php echo $fullname_from_database; ?>">
    <label for="address">Address:</label>
    <input type="text" name="address" id="address" value="<?php echo $address_from_database; ?>">
    <button type="submit" name="personal-details-tab">Save</button>
  </form>

  <!-- Display current personal details -->
  <p>Full Name: <?php echo $fullname_from_database; ?></p>
  <p>Address: <?php echo $address_from_database; ?></p>
</div>


<?php require_once("docend.php"); ?>
