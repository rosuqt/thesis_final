<!-- unfixed stuffs
-css for <p> echo message nmyenyenye
 -->



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>STI Scheduler</title>
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500&display=swap" rel="stylesheet">

</head>
<body>
  <!-- LOGO -->
  <header>
    <div class="leftlogo"><img src="images/logo2.png"></div>
      <nav>
        <div class="title"><p>STI ALABANG</p></div>
        <div class="rightlogo"><img src="images/logo.png"></div>
      </nav>
  </header>

  <!-- sign up form -->
  <section class="container">
    <header>Sign up now</header>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
      <div class="input-box">
        <label>Full Name</label>
        <input type="text" placeholder="Enter full name" id="fullName" name="fullName" required/>
      </div>
      <div class="input-box">
        <label>Email Address</label>
        <input type="text" placeholder="Enter email address" id="email" name="email" required />
      </div>
        <div class="input-box">
          <label>Password</label>
          <input type="password" placeholder="Enter password" id="pw" name="pw" required />
        </div>
      </div>
        </div>
      </div>
      <div class="input-box address">
      <button name="save" type="submit">Sign up</button>
      </div>
      
    
    <?php
    $message = ""; // Initialize the message variable
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $fullName = "root";
        $password = "";
        $database_name = "test";

        $conn = mysqli_connect($servername, $fullName, $password, $database_name);
        

        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        
        if (isset($_POST['save'])) {
            $fullName = $_POST['fullName'];
            $email = $_POST['email'];
            $pw = $_POST['pw'];

            // Check if the email already exists
            $check_query = "SELECT * FROM registration WHERE email = '$email'";
            $result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($result) > 0) {
              $message = "Email already exists. Please use a different email.";
            } else {
                // Insert the new registration
                $sql_query = "INSERT INTO registration (fullName, email, pw) VALUES ('$fullName', '$email', '$pw')";
                
                if (mysqli_query($conn, $sql_query)){
                    header('Location: user_login.php');
                    exit();
                } else {
                    echo "<p>Error: " . $sql_query . " " . mysqli_error($conn) . "</p>";
                }
            }
        }

        mysqli_close($conn);
    }
    ?>
    
    <p class="message-text"><?php echo $message; ?></p><!-- Display the message here -->
    </form>
  </section>

  <section class="sign-in">
    <label><b>STI Alabang's </b>  Scheduling System</label>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, eius, ipsum mollitia maxime,<br>earum adipisci atque dignissimos accusantium quas ut ex voluptas velit est.</p>
    <div class="button">
      <a id="one" href="user_login.php"><button>Sign in</button></a>
    </div> 
  </section>
</body>
</html>
