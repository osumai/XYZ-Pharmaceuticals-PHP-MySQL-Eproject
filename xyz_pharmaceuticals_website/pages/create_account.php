<?php
$docTitle = "Create Account";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and perform basic validation
    $accountType = $_POST['account_type'];
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $fullname = trim($_POST['fullname']);

    // Validate form inputs (you can add more validation if required)
    if (empty($accountType) || empty($email) || empty($password) || empty($fullname)) {
        echo "Please fill in all the required fields.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the SQL statement based on the account type
        if ($accountType == 'candidate') {
            $stmt = $conn->prepare("INSERT INTO candidates (email, password, fullname) VALUES (?, ?, ?)");
        } elseif ($accountType == 'admin') {
            $stmt = $conn->prepare("INSERT INTO admin_details (username, email, password, fullname) VALUES (?, ?, ?, ?)");
            $username = trim($_POST['username']);
            $stmt->bind_param("ssss", $username, $email, $hashedPassword, $fullname);
        } else {
            echo "Invalid account type.";
            exit();
        }

        // Execute the SQL statement
        if ($stmt->execute()) {
            echo "Account created successfully!";
            // Redirect to appropriate login page or desired page
            if ($accountType == 'candidate') {
                header("Location: candidate_login.php");
            } elseif ($accountType == 'admin') {
                header("Location: admin_login.php");
            }
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>

<div id="container">
    <h1 class="page-heading"><span class="page-heading-underline">Create Account</span></h1>
    <p>Please enter your details to create an account.</p>
    <form action="create_account.php" method="POST" name="frmAccount" id="frmAccount" title="Create Account" accept-charset="UTF-8">
        <fieldset>
            <legend>Create Account</legend>
            <p>
                <label for="account_type">Account Type:</label><br>
                <select name="account_type" id="account_type" required>
                    <option value="candidate">Candidate</option>
                    <option value="admin">Admin</option>
                </select>
            </p>
            <p>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required>
            </p>
            <p>
                <label for="fullname">Full Name:</label><br>
                <input type="text" name="fullname" id="fullname" required>
            </p>
            <div id="admin_fields" style="display: none;">
                <p>
                    <label for="username">Username:</label><br>
                    <input type="text" name="username" id="username">
                </p>
            </div>
            <p>
                <input type="submit" value="Create Account">
            </p>
        </fieldset>
    </form>
</div>

<script>
    // Show admin fields when admin account type is selected
    document.getElementById("account_type").addEventListener("change", function() {
        var adminFields = document.getElementById("admin_fields");
        if (this.value === "admin") {
            adminFields.style.display = "block";
        } else {
            adminFields.style.display = "none";
        }
    });
</script>

<?php require_once("docend.php"); ?>
