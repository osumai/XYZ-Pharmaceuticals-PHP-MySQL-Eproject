<?php
$docTitle = "Candidate Details";
require_once("docstart.php");
require_once("navlinks.php");
?>

<?php
// Include the database connection file
require_once("db_conn.php");

// Define the number of records to display per page
$recordsPerPage = 10;

// Get the current page number
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the starting record index for the current page
$startingRecord = ($currentPage - 1) * $recordsPerPage;

// Fetch the total number of candidate records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM job_seekers";
$totalRecordsResult = $conn->query($totalRecordsQuery);
$totalRecords = $totalRecordsResult->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalRecords / $recordsPerPage);

// Fetch the candidate details for the current page
$candidatesQuery = "SELECT * FROM job_seekers LIMIT $startingRecord, $recordsPerPage";
$candidatesResult = $conn->query($candidatesQuery);

// Check if there are any candidate records
if ($candidatesResult->num_rows > 0) {
    ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Email</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through each candidate record and display the details
            while ($row = $candidatesResult->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['fullname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a href="compose_email.php?candidate_id=<?php echo $row['id']; ?>">Email</a></td>
                    <!-- Add more columns as needed -->
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
} else {
    echo "No candidate records found.";
}

// Display pagination links if there are multiple pages
if ($totalPages > 1) {
    ?>
    <div class="pagination">
        <?php
        // Display previous page link
        if ($currentPage > 1) {
            echo '<a href="?page=' . ($currentPage - 1) . '">Previous</a>';
        }

        // Display page numbers
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                echo '<span class="current-page">' . $i . '</span>';
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a>';
            }
        }

        // Display next page link
        if ($currentPage < $totalPages) {
            echo '<a href="?page=' . ($currentPage + 1) . '">Next</a>';
        }
        ?>
    </div>
    <?php
}

// Close the database connection
$conn->close();
?>

<?php require_once("docend.php"); ?>
