<?php
$docTitle = "Quote Us";
require_once("docstart.php");
require_once("navlinks.php");

// Include the database connection file
require_once("db_conn.php");

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fullName = trim($_POST['full_name']);
    $companyName = trim($_POST['company_name']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $postalCode = trim($_POST['postal_code']);
    $country = trim($_POST['country']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $comments = trim($_POST['comments']);

    // Validate form inputs (you can add more validation if required)
    if (empty($fullName) || empty($companyName) || empty($address) || empty($city) || empty($state) || empty($postalCode) || empty($country) || empty($email) || empty($phone) || empty($comments)) {
        echo "Please fill in all the required fields.";
    } else {
        // Prepare and execute the SQL statement
        $stmt = $conn->prepare("INSERT INTO quote_requests (full_name, company_name, address, city, state, postal_code, country, email, phone, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $fullName, $companyName, $address, $city, $state, $postalCode, $country, $email, $phone, $comments);

        if ($stmt->execute()) {
            // Redirect to thank you page
            header("Location: thank_you.php");
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
    <h1 class="page-heading"><span class="page-heading-underline">Quote Us</span></h1>
    <p>Please provide the following details for a quote:</p>
    <form action="quote_us.php" method="POST" name="frmQuote" id="frmQuote" title="Quote Us" accept-charset="UTF-8">
        <fieldset>
            <legend>Quote Request Form</legend>
            <p>
                <label for="full_name">Full Name:</label><br>
                <input type="text" name="full_name" id="full_name" required>
            </p>
            <p>
                <label for="company_name">Company Name:</label><br>
                <input type="text" name="company_name" id="company_name" required>
            </p>
            <p>
                <label for="address">Address:</label><br>
                <input type="text" name="address" id="address" required>
            </p>
            <p>
                <label for="city">City:</label><br>
                <input type="text" name="city" id="city" required>
            </p>
            <p>
                <label for="state">State:</label><br>
                <input type="text" name="state" id="state" required>
            </p>
            <p>
                <label for="postal_code">Postal Code:</label><br>
                <input type="text" name="postal_code" id="postal_code" required>
            </p>
            <p>
                <label for="country">Country:</label><br>
                <input type="text" name="country" id="country" required>
            </p>
            <p>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="phone">Phone:</label><br>
                <input type="text" name="phone" id="phone" required>
            </p>
            <p>
                <label for="comments">Comments:</label><br>
                <textarea name="comments" id="comments" required></textarea>
            </p>
            <p>
                <input type="submit" value="Submit">
            </p>
        </fieldset>
    </form>
</div>

<?php require_once("docend.php"); ?>
