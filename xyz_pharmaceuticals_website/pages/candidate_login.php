<?php
$docTitle = "Candidate Login";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM candidates WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Candidate login successful!";
            // Redirect to candidate dashboard
            header("Location: candidate_education_details.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Candidate account not found.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<div id="container">
    <h1 class="page-heading"><span class="page-heading-underline">Candidate Login</span></h1>
    <p>Please enter your login credentials.</p>
    <form action="candidate_login.php" method="POST" name="frmLogin" id="frmLogin" title="Candidate Login" accept-charset="UTF-8">
        <fieldset>
            <legend>Candidate Login</legend>
            <p>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required>
            </p>
            <p>
                <input type="submit" value="Login">
            </p>
        </fieldset>
    </form>
</div>

<?php require_once("docend.php"); ?>
