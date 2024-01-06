<?php
// Assuming you have a database connection
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    // Sanitize user input to prevent SQL injection
    $fullName = mysqli_real_escape_string($conn, $fullName);
    $email = mysqli_real_escape_string($conn, $email);
    $pw = mysqli_real_escape_string($conn, $pw);

    // Check if the email already exists in the database
    $checkQuery = "SELECT * FROM admin WHERE email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo '<div id="errorMessage">Error: Email already exists</div>';
    } else {
        // Perform SQL insertion
        $sql = "INSERT INTO admin (fullName, email, pw) VALUES ('$fullName', '$email', '$pw')";

        if ($conn->query($sql) === TRUE) {
            echo '<div id="successMessage">Admin added successfully</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/TEST.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    function redirectToPHP() {
		window.location.href = 'admin_dashboard.php';
    }
	function redirectToPHP1() {
		window.location.href = '';
    }
	function redirectToPHP2() {
		window.location.href = 'admin_classSched.php';
    }
	function redirectToPHP3() {
		window.location.href = 'admin_eventSched.php';
    }
	function redirectToPHP4() {
		window.location.href = 'admin_profile.php';
    }
	function redirectToPHP5() {
		window.location.href = 'admin_settings.php';
    }
	function redirectToPHP6() {
		window.location.href = 'admin_logout.php';
    }
  </script>
</head>
<body>
<header> 

<div class="logosec">
    <div class="logo">Admin Page</div>
    <img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png"
        class="icn menuicn"
        id="menuicn"
        alt="menu-icon">
</div>

        <div class="dp">
   <a href="admin_profile.php"> <img src="../images/user.png" alt="Profile Picture"
            class="dpicn"
            alt="dp"></a>
    </div>
</div>
</header>

<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1" onclick="redirectToPHP()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>
					

					<div class="option2 nav-option">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
							class="nav-img"
							alt="articles">
						<h3> Users</h3>
					</div>

					<div class="nav-option option3" onclick="redirectToPHP1()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/5.png"
							class="nav-img"
							alt="report">
						<h3> Class Schedules</h3>
					</div>

					<div class="nav-option option4" onclick="redirectToPHP3()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/6.png"
							class="nav-img"
							alt="institution">
						<h3> Event Schedules</h3>
					</div>

					<div class="nav-option option5" onclick="redirectToPHP4()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png"
							class="nav-img"
							alt="blog">
						<h3> Profile</h3>
					</div>

					<div class="nav-option option6" onclick="redirectToPHP5()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183320/4.png"
							class="nav-img"
							alt="settings">
						<h3> Settings</h3>
					</div>

					<div class="nav-option logout" onclick="redirectToPHP6()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png"
							class="nav-img"
							alt="logout">
						<h3>Logout</h3>
					</div>

				</div>
			</nav>
		</div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
        const menuIcon = document.getElementById('menuicn');
        const navContainer = document.querySelector('.navcontainer');
        const mainContent = document.querySelector('.main-container');
        
        let isOpen = false; // Define the isOpen variable

        // Click event for menu icon
        menuIcon.addEventListener('click', function() {
            if (!isOpen) {
                navContainer.style.left = '0';
                mainContent.style.marginLeft = '220px';
                
            } else {
                navContainer.style.left = '-220px';
                mainContent.style.marginLeft = '0';
              
            }
            isOpen = !isOpen; // Toggle the isOpen variable
        });

        // Trigger the click event to open the navigation initially
       
    });

</script>
    <h2>Add Admin</h2>
    <form action="crud_admin.php" method="POST">
        <label for="fullName">Username:</label>
        <input type="text" id="fullName" name="fullName" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="pw">Password:</label>
        <input type="password" id="pw" name="pw" required>
        <br>
        <a href="TEST.php" class="special-link">Click here to add user</a>

        <input type="submit" value="Add Admin">
    </form>


    <div class="container">
    <table border="1">
        <thead>
        
        </thead>
        <tbody>
            <?php include 'crud_adminView.php'; ?>
        </tbody>
    </table>
    </div>

    
</body>
</html>
