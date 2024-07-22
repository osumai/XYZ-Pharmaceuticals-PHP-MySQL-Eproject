<?php
$docTitle = "Admin Login";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT * FROM admin_details WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Redirect to admin dashboard
            header("Location: admin_dashboard.php");
            exit();
        } else {
            $errorMessage = "Invalid password.";
        }
    } else {
        $errorMessage = "Admin account not found.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<div id="container">
    <h1 class="page-heading"><span class="page-heading-underline">Admin Login</span></h1>
    <p>Please enter your login credentials.</p>
    <form action="admin_login.php" method="POST" name="frmLogin" id="frmLogin" title="Admin Login" accept-charset="UTF-8">
        <fieldset>
            <legend>Admin Login</legend>
            <?php if (isset($errorMessage)) { ?>
                <p class="error-message"><?php echo $errorMessage; ?></p>
            <?php } ?>
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
