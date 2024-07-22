<?php
$docTitle = "Create Account";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform validation on the form data (you can add more validation as per your requirements)
    if (empty($fullname) || empty($email) || empty($password)) {
        $error = "Please fill in all the fields.";
    } else {
        // Check if the email already exists in the database
        $email_query = "SELECT * FROM candidates WHERE email = '$email'";
        $email_result = $conn->query($email_query);

        if ($email_result && $email_result->num_rows > 0) {
            $error = "The email address is already registered.";
        } else {
            // Insert the candidate's data into the database
            $insert_query = "INSERT INTO candidates (fullname, email, password) VALUES ('$fullname', '$email', '$password')";
            if ($conn->query($insert_query) === TRUE) {
                // Redirect to the login page
                header("Location: candidate_login.php");
                exit();
            } else {
                $error = "Error: " . $conn->error;
            }
        }
    }
}
?>

<div id="container">
    <h1 class="page-heading"><span class="page-heading-underline">Create Account</span></h1>

    <?php
    if (isset($error)) {
        echo '<p class="error">' . $error . '</p>';
    }
    ?>

    <form action="" method="POST" class="account-form">
        <div class="form-group">
            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Create Account" class="btn-submit">
        </div>
    </form>
</div>

<?php require_once("docend.php"); ?>
