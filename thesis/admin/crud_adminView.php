<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination variables
$rowsPerPage = 20; // Number of rows per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page or default to page 1

// Calculate the offset for the query
$offset = ($page - 1) * $rowsPerPage;

// Fetch users from the database with pagination
$sql = "SELECT id, fullName, email, pw FROM admin LIMIT $offset, $rowsPerPage"; // Adjust table/column names as needed
$result = $conn->query($sql);

// ... (Previous code remains unchanged)

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th colspan='5' class='manage-header'><span>Manage Admin</span></th></tr>";
    echo "<tr><th>ID</th><th>Full Name</th><th>Email</th><th>Password</th><th>Actions</th></tr>";

    $row_count = 0; // Initialize a row counter

    while ($row = $result->fetch_assoc()) {
        $row_count++; // Increment the row count

        // Apply a style to hide the first row
        if ($row_count === 1) {
            echo "<tr style='display: none;'>"; // Hide the first row using inline CSS
        } else {
            echo "<tr>"; // Display other rows normally
        }

        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['fullName'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['pw'] . "</td>";
        echo "<td>
        <a href='edit.php?id=" . $row['id'] . "'><img src='../images/edit.png' alt='Edit' width='20'></a> | 
        <a href='delete.php?id=" . $row['id'] . "'><img src='../images/delete.png' alt='Edit' width='20'></a>
      </td>";
        echo "</tr>";
    }
    echo "</table>";

    // Pagination links
    $sql = "SELECT COUNT(*) AS count FROM registration";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalRows = $row['count'];
    $totalPages = ceil($totalRows / $rowsPerPage);

    echo "<div>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=$i'>$i</a> ";
    }
    echo "</div>";
} else {
    echo "No users found";
}

$conn->close();
?>