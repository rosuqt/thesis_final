<?php
session_start();

$servername = "localhost";
$fullName = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $fullName, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the admin is logged in
if (!isset($_SESSION['admin_email'])) {
    header("Location: ../admin_login.php"); // Redirect to login page if not logged in
    exit();
}

$admin_email = $_SESSION['admin_email'];

// Fetch user details based on the stored session variable
$sql = "SELECT fullName, email FROM admin WHERE email = '$admin_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $admin_name = $row['fullName'];
    $admin_email = $row['email'];
} else {
    // Handle scenario when user details are not found
    $admin_name = "Admin Name";
    $admin_email = "admin@example.com";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="../css/admin_profile.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    function redirectToPHP() {
		window.location.href = 'admin_dashboard.php';
    }
	function redirectToPHP1() {
		window.location.href = 'TEST.php';
    }
	function redirectToPHP2() {
		window.location.href = 'admin_classSched.php';
    }
	function redirectToPHP3() {
		window.location.href = 'admin_eventSched.php';
    }
	function redirectToPHP4() {
		window.location.href = '';
    }
	function redirectToPHP5() {
		window.location.href = 'admin_settings.php';
    }
	function redirectToPHP6() {
		window.location.href = '../index.php';
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

<header class="user-profile-header">
  <h1 class="profile-heading">User Profile</h1>
</header>

  <main>
    <script>
  function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
        alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      const latitude = position.coords.latitude;
      const longitude = position.coords.longitude;

      // Here, you can send these coordinates to a server to get the city and country using services like reverse geocoding.
      // For simplicity, I'll just display them.
      const locationElement = document.getElementById("userLocation");
      locationElement.innerHTML = `Latitude: ${latitude}<br>Longitude: ${longitude}`;
    }
  </script>
  
    <section class="profile-info">
            <h2>User Information</h2>
            <div class="user-details">
                <img src="../images/user.png" alt="Profile Picture">
                <div class="details">
                    <p><strong>Name:</strong> <?php echo $admin_name; ?></p>
                    <p><strong>Email:</strong> <?php echo $admin_email; ?></p>
                    <button onclick="getLocation()">Get Location</button>
  <div id="userLocation"></div>
                </div>
            </div>
        </section>

        <section class="bio">
  <h2>About Me</h2>
  <form action="" method="post">
    <textarea name="bio" rows="4" cols="50"><?php echo isset($user_bio) ? htmlspecialchars($user_bio) : ''; ?></textarea>
    <input type="submit" value="Save">
  </form>
</section>
        
  </main>

</body>
</html>
