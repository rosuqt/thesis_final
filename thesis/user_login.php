<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style_userLogin.css">
  <title>User Log in</title>
</head>
<body>

  <section class="container">
    <header>Login Account</header>
    <p class="label">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
      <div class="input-box">
        <label>Email Address</label>
        <input type="text" placeholder="Enter Email" id="email" name="email" required/>
      </div>
      <div class="input-box">
        <label>Password</label>
        <input type="password" placeholder="Enter Password" id="pw" name="pw" required/>
      </div>
      <div class="redirect">
        <a href="admin_login.php">Click here for Admin Login</a>
      </div>
      <div class="sign-in">
        <button name="save" type="submit">Sign in</button>
      </div>
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $fullName = "root";
        $password = "";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $fullName, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $email = $_POST['email']; // Assuming the input field name is 'email'
        $pw = $_POST['pw']; // Assuming the input field name is 'password'

        // Query to check if input exists in the database
        $sql = "SELECT email, pw FROM registration WHERE email = '$email' AND pw = '$pw'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Redirect to a different page if the input is found in the database
            header("Location: user/user_dashboard.php");
            exit();
        } else {
            echo "<p>Input not found in the database.</p>";
        }

        $conn->close();
    }
    ?>
    
    <section class="welcome">
      <label>WELCOME BACK</label><br>
      <p1>Nice to see you again</p1><br>
      <p2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi quis unde mollitia, sed quae corrupti quas aspernatur alias accusamus magnam repellat commodi rem velit perferendis suscipit exercitationem voluptates voluptatibus debitis.</p2>
    </section>
  </section>
  
  <div class="return-btn">
    <a href="index.php"><img src="images/arrow.png" alt="Back to Homepage" width="50" height="50"></a>
  </div>
</body>
</html>
