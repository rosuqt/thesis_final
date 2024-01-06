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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $sql = "SELECT email, pw FROM admin WHERE email = '$email' AND pw = '$pw'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin_email'] = $email; // Store admin email in session
        header("Location: admin/admin_dashboard.php");
        exit();
    } else {
        echo "Input not found in the database.";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style_adminLogin.css">
  <title>User Log in</title>
  <script type="text/javascript">
    function redirectToPHP() {
        var email = document.getElementById("email").value;
        var pw = document.getElementById("pw").value;
    }
  </script>
</head>
<body>
  <section class="container">
    <header>Admin Login</header>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
      <div class="input-box">
        <label>Email Address</label>
        <input type="text" placeholder="Enter Email" id="email" name="email" required/>
      </div>
      <div class="input-box">
        <label>Password</label>
        <input type="password" placeholder="Enter Password" id="pw" name="pw" required/>
      </div>
      <div class="sign-in">
        <button onclick="redirectToPHP()">Sign in</button>
      </div>
    </form>
    
    <section class="welcome">
      <label>WELCOME BACK</label><br>
      <p1>Nice to see you again</p1><br>
      <p2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi quis unde mollitia, sed quae corrupti quas aspernatur alias accusamus magnam repellat commodi rem velit perferendis suscipit exercitationem voluptates voluptatibus debitis.</p2>
    </section>
  </section>
  
  <div class="return-btn">
    <a href="user_login.php"><img src="images/arrow.png" alt="Back to Homepage" width="50" height="50"></a>
  </div>
</body>
</html>
