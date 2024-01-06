<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Delete user record
    $sql = "DELETE FROM admin WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: crud_admin.php"); // Redirect after successful deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>
