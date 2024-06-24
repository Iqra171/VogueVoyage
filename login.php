<?php
include 'connection2.php'; // Include database connection

$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Login Section
    if (isset($_POST["login_submit"])) {
        $femail = $_POST["femail"];
        $pass = $_POST["pass"];

        // Prepare and execute SQL query with prepared statement
        $stmt = $conn->prepare("SELECT * FROM signup WHERE femail = ? AND pass = ?");
        $stmt->bind_param("ss", $femail, $pass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $login = true;
        } else {
            $showError = "Invalid email or password.";
        }
    }
    // Signup Section
    elseif (isset($_POST["signup_submit"])) {
        $fname = $_POST["fname"];
        $femail = $_POST["femail"];
        $pass = $_POST["pass"];

        // Check if email already exists
        $check_query = "SELECT * FROM signup WHERE femail = '$femail'";
        $check_result = $conn->query($check_query);

        if ($check_result->num_rows > 0) {
            $showError = "User already exists!";
        } else {
            // Hash password
            $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
            // Prepare and execute SQL query with prepared statement
            $stmt = $conn->prepare("INSERT INTO signup (fname, femail, pass) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $fname, $femail, $hashed_pass);
            if ($stmt->execute()) {
                $login = true;
            } else {
                $showError = "Error occurred during signup.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
       <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
 

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
   background-color: #003329;
  }
.logo {
    text-align:center;
    color: #f3f3f3;
}
.navigation a{
color: #359381;
padding: 6px 15px;
border-radius: 20px;
margin: 0 10px;  
font-weight: 600;
}
.navigation a:hover, 
.navigation a.active{
background: #359381;
color: #fff;
}
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  border: 1px solid #e7e7e7;
  background-color: #f3f3f3;
}

li {
  float:right ;
}

li a {
  display: block;
  color: #666;
  text-align: right;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #ddd;
}

li a.active {
  color: white;
  background-color: #04AA6D;
}
  .container {
    width: 90%;
    /* Or any desired width */
    height: 30px;
    /* Or any desired height */
    display: flex;
    flex-wrap: wrap;
    text-align: center;
  }
 

  .div-item {
    background-color: lightgrey;
    height: 470px;
    width: 600px;

    border: 5px solid rgb(248, 255, 248);
    padding: 4px;
    margin: 9px auto;
  }
   

  input {
    border-radius: 10px 10px 10px 10px;
    height: 30px;
    width:250px ;
  }
  button{
    align-content: center;
  }
</style>
    </style>
</head>

<body>
<header>
    <h1 class="logo">VogueVoyage</h1>
    <nav class="navigation">
      <ul>
       
        <li> <a href="review.php">REVIEW </a></li>
        <li><a href="login.php">LOGIN</a></li>

        <li><a href="signup.php" class="active">SIGN UP </a></li>
        <li> <a href="gilgit.html" >SERVICES</a></li>
        <li> <a href="c.html">HOME </a></li>
      </ul>
    </nav>
  </header>
    <!-- Your HTML content goes here -->
    <div class="container">
        <!-- Login Form -->
        <div class="login-form">
            <h2>Login</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="femail" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login_submit">Login</button>
            </form>
            <?php if ($showError) : ?>
                <div class="alert alert-danger"><?php echo $showError; ?></div>
            <?php endif; ?>
        </div>

        <!-- Signup Form -->
        <div class="signup-form">
            <h2>LOGIN </h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="fname" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="femail" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="pass" required>
                </div>
                <button type="submit" class="btn btn-primary" name="signup_submit">Sign Up</button>
            </form>
            <?php if ($login) : ?>
                <div class="alert alert-success">Sign up successful!</div>
            <?php elseif ($showError) : ?>
                <div class="alert alert-danger"><?php echo $showError; ?></div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
