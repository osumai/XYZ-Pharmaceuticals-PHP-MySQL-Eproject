 <!-- admin_dashboard.php -->
<?php #Link to the main stylesheet ?>
<link rel="stylesheet" href="../css/main.css">
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome, Admin!</h1>

    <?php
    session_start();

    // Include the database connection file
    require_once("db_conn.php");

    // Check if the admin is logged in
    if (!isset($_SESSION['admin'])) {
        header("Location: admin_login.php"); // Redirect to the admin login page
        exit();
    }

    // Retrieve current website details from the database
    $stmt = $conn->prepare("SELECT * FROM website_details");
    $stmt->execute();
    $result = $stmt->get_result();
    $websiteDetails = $result->fetch_assoc();
    $stmt->close();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $companyName = $_POST['company_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $postalCode = $_POST['postal_code'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        // Validate inputs (add your own validation rules as needed)

        // Update the website details in the database
        $stmt = $conn->prepare("UPDATE website_details SET company_name = ?, address = ?, city = ?, state = ?, postal_code = ?, country = ?, email = ?, phone = ?");
        $stmt->bind_param("ssssssss", $companyName, $address, $city, $state, $postalCode, $country, $email, $phone);

        if ($stmt->execute()) {
            echo "<p>Website details updated successfully!</p>";
        } else {
            echo "<p>Error updating website details: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>

    <h2>Update Site Details</h2>
    <form action="admin_dashboard.php" method="POST">
        <label for="company_name">Company Name:</label><br>
        <input type="text" name="company_name" id="company_name" required value="<?php echo $websiteDetails['company_name']; ?>"><br><br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" id="address" required value="<?php echo $websiteDetails['address']; ?>"><br><br>

        <label for="city">City:</label><br>
        <input type="text" name="city" id="city" required value="<?php echo $websiteDetails['city']; ?>"><br><br>

        <label for="state">State:</label><br>
        <input type="text" name="state" id="state" required value="<?php echo $websiteDetails['state']; ?>"><br><br>

        <label for="postal_code">Postal Code:</label><br>
        <input type="text" name="postal_code" id="postal_code" required value="<?php echo $websiteDetails['postal_code']; ?>"><br><br>

        <label for="country">Country:</label><br>
        <input type="text" name="country" id="country" required value="<?php echo $websiteDetails['country']; ?>"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required value="<?php echo $websiteDetails['email']; ?>"><br><br>

        <label for="phone">Phone:</label><br>
        <input type="tel" name="phone" id="phone" required value="<?php echo $websiteDetails['phone']; ?>"><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>

