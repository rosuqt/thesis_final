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

    // Fetch user data for the provided ID
    $sql = "SELECT id, fullName, email, pw FROM admin WHERE id = $userId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Admin not found";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateAdmin'])) {
    $userId = $_POST['userId'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    // Update user data
    $sql = "UPDATE admin SET fullName='$fullName', email='$email', pw='$pw' WHERE id=$userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: crud_admin.php"); // Redirect after successful update
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <link rel="stylesheet" href="../css/edit.css">
</head>
<body>
    <h2>Edit Admin</h2>
    <form method="post" action="editAdmin.php">
        <input type="hidden" name="userId" value="<?php echo $user['id']; ?>">
        Full Name: <input type="text" name="fullName" value="<?php echo $user['fullName']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
        Password: <input type="password" name="pw" value="<?php echo $user['pw']; ?>"><br>
        <input type="submit" name="updateAdmin" value="Update">
    </form>
</body>
</html>
