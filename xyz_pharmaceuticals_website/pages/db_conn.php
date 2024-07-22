<?php
$docTitle = "Database Connection";
require_once("docstart.php");

// Include the database configuration file
require_once("config.php");

// Create a connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
