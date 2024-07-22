<?php
$docTitle = "Compose Email";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

// Check if the candidate ID is provided in the query string
if (isset($_GET['candidate_id']) && is_numeric($_GET['candidate_id'])) {
    $candidateId = $_GET['candidate_id'];

    // Fetch the candidate's details from the database
    $candidateQuery = "SELECT * FROM candidates WHERE id = $candidateId";
    $candidateResult = $conn->query($candidateQuery);

    if ($candidateResult->num_rows == 1) {
        $candidate = $candidateResult->fetch_assoc();

        // Check if the email form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the form data
            $to = $_POST['to'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            // Send the email
            $headers = "From: admin@example.com\r\n";
            $headers .= "Reply-To: admin@example.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($to, $subject, $message, $headers)) {
                echo "Email sent successfully.";
            } else {
                echo "Failed to send email.";
            }
        }
        ?>
        <div id="container">
            <h1 class="page-heading"><span class="page-heading-underline">Compose Email</span></h1>
            <form action="compose_email.php?candidate_id=<?php echo $candidate['id']; ?>" method="POST">
                <fieldset>
                    <legend>Email Details</legend>
                    <p>
                        <label for="to">To:</label><br>
                        <input type="email" name="to" id="to" value="<?php echo $candidate['email']; ?>" required>
                    </p>
                    <p>
                        <label for="subject">Subject:</label><br>
                        <input type="text" name="subject" id="subject" required>
                    </p>
                    <p>
                        <label for="message">Message:</label><br>
                        <textarea name="message" id="message" rows="5" required></textarea>
                    </p>
                    <p>
                        <input type="submit" value="Send">
                    </p>
                </fieldset>
            </form>
        </div>
        <?php
    } else {
        echo "Candidate not found.";
    }
} else {
    echo "Invalid candidate ID.";
}

// Close the database connection
$conn->close();
?>

<?php require_once("docend.php"); ?>
