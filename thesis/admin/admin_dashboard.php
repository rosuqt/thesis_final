<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0">
	<title>Admin Page</title>
	<link rel="stylesheet"
    type="text/css" href="../css/style_adminDashboard.css">
	<link rel="stylesheet"
    type="text/css" href="../css/responsive.css">
	<script type="text/javascript">
   function redirectToPHP() {
		window.location.href = '';
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
		window.location.href = 'admin_profile.php';
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
		</div>

	</header>

	<div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
					<div class="nav-option option1">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png"
							class="nav-img"
							alt="dashboard">
						<h3> Dashboard</h3>
					</div>
					

					<div class="option2 nav-option"  onclick="redirectToPHP1()">
						<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/9.png"
							class="nav-img"
							alt="articles">
						<h3> Users</h3>
					</div>

					<div class="nav-option option3" onclick="redirectToPHP2()">
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
		<div class="main">

			<div class="searchbar2">
				<input type="text"
					name=""
					id=""
					placeholder="Search">
				<div class="searchbtn">
				<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210180758/Untitled-design-(28).png"
						class="icn srchicn"
						alt="search-button">
				</div>
			</div>

			<script>
  document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menuicn');
    const navContainer = document.querySelector('.navcontainer');
    const mainContent = document.querySelector('.main-container');
    const boxContent = document.querySelector('.box');

    let isOpen = false;

    menuIcon.addEventListener('click', function() {
        if (isOpen) {
            navContainer.style.left = '-220px';
            mainContent.style.marginLeft = '0'; 
            boxContent.style.marginLeft = '0'; 
        } else {
            navContainer.style.left = '0'; 
            mainContent.style.marginLeft = '130px'; 
            boxContent.style.marginLeft = '-20px'; 
        }
        isOpen = !isOpen;
    });

    menuIcon.click();
});
    </script>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) AS totalUsers FROM registration"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['totalUsers'];
} else {
    $totalUsers = 0;
}

$conn->close();
?>
			<div class="box-container">

				<div class="box box1"><a href="TEST.php">
					<div class="text">
						<h2 class="topic-heading"><?php echo $totalUsers; ?></h2>
						<h2 class="topic">User Count</h2>
					</div></a>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(31).png"
						alt="Views">
				</div>

				<div class="box box2"><a href="admin_classSched.php">
					<div class="text">
						<h2 class="topic-heading">0</h2>
						<h2 class="topic">Schedules Created</h2>
					</div></a>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes">
				</div>

				<div class="box box3"><a href="admin_eventSched.php">
					<div class="text">
						<h2 class="topic-heading">0</h2>
						<h2 class="topic">Upcoming Events</h2>
					</div></a>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments">
				</div>
				<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT COUNT(*) AS totalAdmin FROM admin"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalAdmin = $row['totalAdmin'];
} else {
    $totalAdmin = 0;
}

$conn->close();
?>
				<div class="box box4"><a href="crud_admin.php">
					<div class="text">
						<h2 class="topic-heading"><?php echo $totalAdmin; ?></h2>
						<h2 class="topic">Admin Count</h2>
					</div></a>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div>
			</div>

			<div class="report-container">
				<div class="report-header">
					<h1 class="recent-Articles">Recent Sessions</h1>
					<button class="view">View All</button>
				</div>

				<div class="report-body">
					<div class="report-topic-heading">
						<h3 class="t-op">fullName</h3>
						<h3 class="t-op">Start</h3>
						<h3 class="t-op">Last Active</h3>
						<h3 class="t-op">Length</h3>
					</div>

					<div class="items">
						<div class="item1">
							<h3 class="t-op-nextlvl">Ally Rozu</h3>
							<h3 class="t-op-nextlvl">04/05/2023, 08:36 pm</h3>
							<h3 class="t-op-nextlvl">10/03/2023, 10:36 pm</h3>
							<h3 class="t-op-nextlvl label-tag">666 hrs</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Zeyn Esplana</h3>
							<h3 class="t-op-nextlvl">12/25/2022, 12:23pm</h3>
							<h3 class="t-op-nextlvl">12/26/2022, 01:34am</h3>
							<h3 class="t-op-nextlvl label-tag">420 hrs</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Mark Toniels</h3>
							<h3 class="t-op-nextlvl">11/25/2023, 8:39pm</h3>
							<h3 class="t-op-nextlvl">11/25/2023, 10:40pm</h3>
							<h3 class="t-op-nextlvl label-tag">69 hrs</h3>
						</div>

						<div class="item1">
							<h3 class="t-op-nextlvl">Dayoni Brodie</h3>
							<h3 class="t-op-nextlvl">11/20/23, 9:39am</h3>
							<h3 class="t-op-nextlvl">11/20/23, 10:40am</h3>
							<h3 class="t-op-nextlvl label-tag">05 hrs</h3>
						</div>



					</div>
				</div>
			</div>
		</div>
	</div>


</body>
</html>
