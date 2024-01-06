<?php
$servername = "localhost";
$fullName = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $fullName, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Assuming the input field name is 'email'
    $pw = $_POST['pw']; // Assuming the input field name is 'password'

    // Query to check if input exists in the database
    $sql = "SELECT email, pw FROM admin WHERE email = '$email' AND pw = '$pw'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect to a different page if the input is found in the database
        header("Location: test.php");
        exit();
    } else {
        echo "<p>Input not found in the database.</p>";
    }
}

$conn->close();
?>