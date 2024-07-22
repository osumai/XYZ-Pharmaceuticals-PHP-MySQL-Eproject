<?php
$docTitle = "Careers";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

// Retrieve the job listings from the database
$job_query = "SELECT * FROM job_listings";
$job_result = $conn->query($job_query);
?>

<div id="container">
    <h1 class="page-heading"><span class="page-heading-underline">Job Listings</span></h1>

    <div class="job-listings">
        <?php if ($job_result && $job_result->num_rows > 0) {
            while ($job_data = $job_result->fetch_assoc()) {
                $job_title = $job_data['title'];
                $job_description = $job_data['description'];
                $job_location = $job_data['location'];
                ?>
                <div class="job-item">
                    <h2><?php echo $job_title; ?></h2>
                    <p><?php echo $job_description; ?></p>
                    <p><strong>Location:</strong> <?php echo $job_location; ?></p>
                    <a href="create_candidate_account.php?job_id=<?php echo $job_data['id']; ?>" class="apply-button">Apply Now</a>
                </div>
                <?php
            }
        } else {
            echo "<p>No job listings available at the moment.</p>";
        }
        ?>
    </div>

    <div class="candidate-account">
        <h2>Create Candidate Account</h2>
        <p>Sign up to apply for job listings and manage your applications.</p>
        <a href="create_candidate_account.php" class="account-button">Create Account</a>
    </div>

    <div class="candidate-login">
        <h2>Already have an account?</h2>
        <p>Login to access your candidate account.</p>
        <a href="candidate_login.php" class="login-button">Login</a>
    </div>
</div>

<?php require_once("docend.php"); ?>
